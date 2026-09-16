import { computed, toValue } from 'vue';

export const useMonthlyPayment = (price, years, rate) => {
    const monthlyPayment = computed(() => {
        const principle = Number(toValue(price) ?? 0);
        const rateVal = Number(toValue(rate) ?? 0);
        const yearsVal = Number(toValue(years) ?? 0);

        if (isNaN(principle) || principle <= 0) return 0;
        if (isNaN(yearsVal) || yearsVal <= 0) return 0;
        if (isNaN(rateVal) || rateVal < 0) return 0;

        const numberOfPaymentMonths = yearsVal * 12;
        if (numberOfPaymentMonths <= 0) return 0;

        const monthlyInterestRate = (rateVal / 100) / 12;

        if (monthlyInterestRate === 0) {
            return Math.round(principle / numberOfPaymentMonths);
        }

        const factor = Math.pow(1 + monthlyInterestRate, numberOfPaymentMonths);
        if (!isFinite(factor) || factor <= 1) {
            return Math.round(principle / numberOfPaymentMonths);
        }

        return Math.round(
            (principle * monthlyInterestRate * factor) / (factor - 1)
        );
    });

    const totalPaid = computed(() => {
        const yearsVal = Number(toValue(years) ?? 0);
        const numberOfPaymentMonths = yearsVal * 12;
        if (numberOfPaymentMonths <= 0) return 0;
        return Math.round(numberOfPaymentMonths * monthlyPayment.value);
    });

    const totalInterest = computed(() => {
        const principle = Number(toValue(price) ?? 0);
        if (principle <= 0) return 0;
        return Math.max(0, Math.round(totalPaid.value - principle));
    });

    return { monthlyPayment, totalPaid, totalInterest };
};