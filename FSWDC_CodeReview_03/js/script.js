////////////////////////////////////////////////////////////////
// TASK1: FUNCTION to calculate the invoice for one customer. //
////////////////////////////////////////////////////////////////

function calculateInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice) {
    sumInvoice = starterPrice + maindishPrice + dessertPrice + beveragePrice;
    sumInvoiceRounded = sumInvoice.toFixed(2);
    console.log(sumInvoiceRounded);
}



///////////////////////////////////
// TASK2: CHECKING the function. //
///////////////////////////////////

// ### Order of Customer 1:

/*  1 Caesar's salad (Starter)      € 5.95
    1 Veggie-Burger (Main Course)   € 7.49
    1 Cheesecake (Dessert)          € 2.99
    1 Iced Tea (Beverage)           € 2.85
                                   -------
                                   € 19.28 */

// ### Setting variables ...

var starterPrice = 5.95;
var maindishPrice = 7.49;
var dessertPrice = 2.99;
var beveragePrice = 2.85;
                                  
calculateInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice);

// ### Result in console ==> 19.28 (check) <<<<<<



//////////////////////////////////////////////////////////
// TASK3: CHECKING the results with 3 different orders. //
//////////////////////////////////////////////////////////

// ### Order of Customer 1:

/*  1 Nacho Grande (Starter)        € 4.95
    1 Our Burgatory (Main Course)  € 11.75
    1 Cookies (Dessert)             € 4.25
    1 Corona (Beverage)             € 3.90
                                   -------
                                   € 24.85 */

// ### Setting variables ...

var starterPrice = 4.95;
var maindishPrice = 11.75;
var dessertPrice = 4.25;
var beveragePrice = 3.90;

calculateInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice);

// ### Result in console ==> 24.85 (check) <<<<<<


// ### Order of Customer 2:

/*  1 Shrimp Basket (Starter)       € 6.50
    1 Double Cheese (Main Course)   € 9.85
    1 Donut (Dessert)               € 1.95
    1 Water (Beverage)              € 1.85
                                   -------
                                   € 20.15 */

// ### Setting variables ...

var starterPrice = 6.50;
var maindishPrice = 9.85;
var dessertPrice = 1.95;
var beveragePrice = 1.85;

calculateInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice);

// ### Result in console ==> 20.15 (check) <<<<<<


// ### Order of Customer 3:

/*  1 Chicken Wings (Starter)       € 5.50
    1 Pulled Pork (Main Course)    € 12.95
    1 Icecream (Dessert)            € 2.89
    1 Fruit Juice (Beverage)        € 3.05
                                   -------
                                   € 24.39 */

// ### Setting variables ...

var starterPrice = 5.50;
var maindishPrice = 12.95;
var dessertPrice = 2.89;
var beveragePrice = 3.05;

calculateInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice);

// ### Result in console ==> 24.39 (check) <<<<<<



//////////////////////////////////////////////////
// BONUS-TASK: Function to apply a 10% discount //
//             on everything but the beverages. //
//////////////////////////////////////////////////

function studentInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice) {
    sumInvoice = ((starterPrice + maindishPrice + dessertPrice) / 100 * 90) + beveragePrice;
    sumInvoiceRounded = sumInvoice.toFixed(2);
    console.log(sumInvoiceRounded);
}


// ### Order of Customer 1:

/*  1 Nacho Grande (Starter)        € 4.95
    1 Our Burgatory (Main Course)  € 11.75
    1 Cookies (Dessert)             € 4.25
                                   -------
                                   € 20.95
                        - 10%       € 2.10
                                   -------
                                   € 18.85
    1 Corona (Beverage)             € 3.90
                                   -------
                                   € 22.75 */

// ### Setting variables ...

var starterPrice = 4.95;
var maindishPrice = 11.75;
var dessertPrice = 4.25;
var beveragePrice = 3.90;

studentInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice);

// ### Result in console ==> 22.75 (check) <<<<<<


// ### Order of Customer 2:

/*  1 Shrimp Basket (Starter)       € 6.50
    1 Double Cheese (Main Course)   € 9.85
    1 Donut (Dessert)               € 1.95
                                   -------
                                   € 18.30
                        - 10%       € 1.83
                                   -------
                                   € 16.47
    1 Water (Beverage)              € 1.85
                                   -------
                                   € 18.32 */

// ### Setting variables ...

var starterPrice = 6.50;
var maindishPrice = 9.85;
var dessertPrice = 1.95;
var beveragePrice = 1.85;

studentInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice);

// ### Result in console ==> 18.32 (check) <<<<<<


// ### Order of Customer 3:

/*  1 Chicken Wings (Starter)       € 5.50
    1 Pulled Pork (Main Course)    € 12.95
    1 Icecream (Dessert)            € 2.89
                                   -------
                                   € 21.34
                        - 10%       € 2.13
                                   -------
                                   € 19.21
    1 Fruit Juice (Beverage)        € 3.05
                                   -------
                                   € 22.26 */

// ### Setting variables ...

var starterPrice = 5.50;
var maindishPrice = 12.95;
var dessertPrice = 2.90;
var beveragePrice = 3.05;

studentInvoice(starterPrice, maindishPrice, dessertPrice, beveragePrice);

// ### Result in console ==> 22.26 (check) <<<<<<