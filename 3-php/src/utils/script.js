// Waits for the page to be load
window.addEventListener("load", () => {
    // HashTable with the values and percentage
    let taxes = {
        710: 0,
        1015: 11.3,
        1577: 17.2,
        2109: 21.9,
        5241: 32.3,
        11384: 39.2,
        25505: 43.8,
    };

    const discountCard = 7.63;
    const discountMoney = 4.77;
    const workDays = 22;

    // Meal Card, Money, None
    let typeMealAllowance = document.getElementById("meal_allowance");
    let mealAllowance = document.getElementById("meal_allowance_amount");
    let mealDays = document.getElementById("meal_days");

    // Listens for a change in the select box
    typeMealAllowance.addEventListener("change", () => {
        // If Type None
        if (typeMealAllowance.value === "no_allowance") {
            mealAllowance.value = 0;
            mealDays.value = 0;
            mealAllowance.disabled = true;
            mealDays.disabled = true;
        } else {
            mealAllowance.disabled = false;
            mealDays.disabled = false;
        }
    });

    // Listens for a change in the day box
    mealDays.addEventListener("change", () => {
        // if already exists error message delete it
        if (mealDays.parentNode.querySelector("span")) {
            mealDays.parentNode.querySelector("span").remove();
            mealDays.style.border = "1px solid #000000";
        }
        // if the number of days are invalid
        if (mealDays.value > 31 || mealDays.value < 1) {
            mealDays.style.border = "1px solid red";
            let span = document.createElement("span");
            span.innerHTML = "Please enter a valid number between 1 and 31";
            span.style.color = "red";
            span.style.fontWeight = "bold";
            mealDays.parentNode.appendChild(span);
        }
    });

    // Get Tax amount
    function getTaxRate(grossSalary, taxTable) {
        // Loops HashTable
        for (let salary in taxTable) {
            if (salary >= grossSalary) {
                return taxTable[salary];
            }
        }
        return 43.8;
    }

    function calculateMealAllowance (netSalary, grossSalary, typeMealAllowance, mealAllowance, mealDays) {
        let mealAllowanceTaxed = 0;
        if (typeMealAllowance === "no_allowance") {
            return {netSalary: netSalary, grossSalary: grossSalary};
        }
        if (typeMealAllowance === "card") {
            if (mealAllowance >= discountCard) {
                mealAllowanceTaxed = mealAllowance - discountCard;
                grossSalary = grossSalary + (mealAllowance - discountCard) * mealDays;
                netSalary = netSalary + discountCard * mealDays;
            } else {
                netSalary = netSalary + mealAllowance * workDays;
            }
            return {netSalary: netSalary, grossSalary: grossSalary, mealAllowanceTaxed: mealAllowanceTaxed};
        }

        if (mealAllowance >= discountMoney) {
            mealAllowanceTaxed = mealAllowance - discountMoney;
            grossSalary = grossSalary + (mealAllowance - discountMoney) * mealDays;
            netSalary = netSalary + discountMoney * workDays;
        } else {
            netSalary = netSalary + mealAllowance * mealDays;
        }
        return {netSalary: netSalary, grossSalary: grossSalary, mealAllowanceTaxed: mealAllowanceTaxed};
    }

    function calculateNetSalary() {
        let netSalaryTemp = 0;

        // Get User Input
        let typeMealAllowance = document.getElementById("meal_allowance").value;
        let mealAllowance =+ document.getElementById("meal_allowance_amount").value;
        let grossSalary =+ document.getElementById("base_salary").value;
        const mealDays =+ document.getElementById("meal_days").value;

        const result = calculateMealAllowance(netSalaryTemp, grossSalary, typeMealAllowance, mealAllowance, mealDays);
        netSalaryTemp = result.netSalary;
        grossSalary = result.grossSalary;

        // Get Values
        const taxOwed = getTaxRate(grossSalary, taxes);
        const discount_ss = grossSalary * (11 / 100);
        const discount_irs = grossSalary * (taxOwed / 100);
        const netSalary = grossSalary - discount_irs - discount_ss + netSalaryTemp;

        // Display values to the HTML
        document.getElementById("net_salary").textContent = netSalary.toFixed(2);
        document.getElementById("discount_irs").textContent = discount_irs.toFixed(2);
        document.getElementById("discount_ss").textContent = discount_ss.toFixed(2);
        document.getElementById("gross_salary").textContent = grossSalary.toFixed(2);
        document.getElementById("taxes").textContent = taxOwed.toFixed(2) + "%";
        document.getElementById("meal_allowance_value").textContent = (mealDays * mealAllowance).
        toFixed(2);
        document.getElementById("meal_allowance_taxed").textContent = (result.mealAllowanceTaxed * mealDays).
        toFixed(2);
    }

    // Redirects to Dashboard
    function redirect() {
        location.replace("../pages/dashboard/dashboard.php");
    }

    // Buttons
    const calculateButton = document.getElementById("calculate");
    calculateButton.addEventListener("click", calculateNetSalary);
    const redirectButton = document.getElementById("redirect");
    redirectButton.addEventListener("click", redirect)
});
