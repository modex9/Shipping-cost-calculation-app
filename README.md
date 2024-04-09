## Description
This application calculates shipping cost, based on selected calculation method (transportation method) 
and displays the result in a table on the same page.

## Technologies
 - PHP 8.1
 - Laravel 10.48.4
 - Vue 3
 - Tailwind 3
 - Mysql 8

## Adding new calculation methods

The app follows specific patterns and structure, so adding a new calculation methods is fairly simple.
The process can be broken down in these generic steps:
   - Add Vue form component for whatever variables your calculation is going to use (hereafter "variables") in `resources/js/CarrierForms`.
   - Include this component at the main component `App.vue`.
   - On the backend, add migration with `php artisan make:migration` for the variables.
   - In `/app/Services/ShipmentCreationService.php` add new variables.
   - Add validation rules and validation failure messages for the variables in `app/Http/Requests/CalculateShippingRequest.php`.
   - Add technical name and translation of your calculation method in `app/Enums/ShippingTypes.php`.
   - Implement your calculation logic in `app/Strategy/ShippingCalculation` by creating a class that implements `ShippingCalculationContract`.
   - Implement your shipment data format in `app/Strategy/ShipmentDataFormat` by creating a class that implements `ShipmentDataFormatContract`.
   - Adjust Shipment and TransportCalculation controller where needed, to use new structures.
