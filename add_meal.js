
const ingredients = document.querySelectorAll('input[id^="ingredient_"]');
const ingredientPrices = document.querySelectorAll('input[id^="ingr_price_"]');
const totalPriceInput = document.getElementById('price');


[...ingredients, ...ingredientPrices].forEach(input => {
    input.addEventListener('change', calculateTotalPrice);
});

function calculateTotalPrice() {
    let total = 0;
    // Iteriramo kroz sva polja za unos cijena sastojaka
    ingredientPrices.forEach(input => {
        // Provjeravamo da li je unos validan broj i dodajemo ga na ukupnu cijenu
        if (!isNaN(parseFloat(input.value)) && isFinite(input.value)) {
            total += parseFloat(input.value);
        }
    });
    // Popunjavamo polje za unos ukupne cijene jela
    totalPriceInput.value = total.toFixed(2);
}

totalPriceInput.addEventListener('input', adjustIngredientPrices);

function adjustIngredientPrices() {
    const total = parseFloat(totalPriceInput.value);
    const numberOfIngredients = ingredientPrices.length;
    const averagePrice = total / numberOfIngredients;
    // Postavljamo nove cijene za svaki sastojak
    ingredientPrices.forEach(input => {
        input.value = averagePrice.toFixed(2);
    });
}
