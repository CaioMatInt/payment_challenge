# Challenge description

Create a bank management system through an API, consisting of two endpoints: **/account** and **/transaction**. 

The **/account** endpoint should create and provide information about the account number and balance. The **/transaction** endpoint will be responsible for carrying out various financial operations.

>⚠️PS: This coding challenge was migrated from a private repository that I own, and the specifications were altered to protect and anonymize it, since it originates from a challenge specific of a particular company.

___
**Payment Methods:**

There are three available transaction types: **debit**, **credit**, and **Pix**, each with different fees.

Use the following abbreviations for payment methods:

    P => Pix, C => Credit Card & D => Debit Card
___
**Fees:**

Each type of transaction should have a specific fee, with the fees being:

    Debit fee: 3% of the transaction
    Credit fee: 5% of the transaction
    Pix fee: No cost

The endpoints should have the following input and output standards in JSON format:
___
**Endpoints:**

POST **/transaction**

> Input example => JSON `{"payment_method":"D", "account_id": 1234, "amount":10}`
> 
> Output => HTTP STATUS 201 / JSON `{"account_id": 1234, "balance": 189.70}`
> 
> HTTP STATUS 404 (If there is no available balance)

POST **/account**

> Input => JSON `{"account_id": 1234, "amount":10}`
> 
> Output => HTTP STATUS 201 / JSON `{"account_id": 1234, "balance": 189.70}`

GET **/account?id=1234**

> Output => HTTP STATUS 200 and a JSON `{"account_id": 1234, "balance": 200}`
> 
> If the account does not exist, return HTTP STATUS 404

## Database diagram
![image](https://github.com/CaioMatInt/payment_challenge/assets/40992883/aa649f6e-713d-4a32-be69-b5151b1a73fb)

## System Architecture
![image](https://github.com/CaioMatInt/payment_challenge/assets/40992883/3ba42426-2e5c-4b7e-9f67-66550e457b20)

## Postman Collection
The Postman collection can be found at the root of the project
> payment_challenge.postman_collection.json

## Tests
PhpUnit was used for implementing automated tests. The tests are located in app/tests.
