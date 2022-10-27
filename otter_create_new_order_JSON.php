<?php
Order Creation Endpoint
{
  "externalIdentifiers": {
    "id": "69f60a06-c335-46d9-b5a1-97f1a211c514",
    "friendlyId": "ABCDE",
    "source": "ubereats"
  },
  "items": [
    {
      "id": "33e0418f-3d56-4360-ba03-18fc5f8844a3",
      "name": "Juicy Cheeseburger",
      "quantity": 1,
      "note": "Please cook to well done!",
      "categoryId": "303de078-870d-4349-928b-946869d4d69b",
      "categoryName": "Burgers",
      "price": 5.9,
      "modifiers": [
        {
          "id": "d7a21692-9195-43aa-a58f-5395bba8a804",
          "name": "Avocado",
          "quantity": 1,
          "price": 1,
          "groupName": "Add ons",
          "groupId": "fb52b138-7ac4-42c1-bfd8-664d57113a41",
          "modifiers": [
            {}
          ]
        }
      ]
    }
  ],
  "orderedAt": "2007-12-03T10:15:30+01:00",
  "currencyCode": "EUR",
  "customer": {
    "name": "Jane Doe",
    "phone": "+1-555-555-5555",
    "phoneCode": "111 11 111",
    "email": "email@email.com",
    "personalIdentifiers": {
      "taxIdentificationNumber": 1234567890
    }
  },
  "customerNote": "Please include extra napkins!",
  "status": "NEW_ORDER",
  "deliveryInfo": {
    "courier": {
      "name": "Jane Doe",
      "phone": "+1-555-555-5555",
      "phoneCode": "111 11 111",
      "email": "email@email.com",
      "personalIdentifiers": {
        "taxIdentificationNumber": 1234567890
      }
    },
    "destination": {
      "postalCode": "20500",
      "city": "Washington",
      "state": "DC",
      "countryCode": "US",
      "addressLines": [
        "1600 Pennsylvania Avenue NW"
      ],
      "location": {
        "latitude": 38.8977,
        "longitude": 77.0365
      }
    },
    "licensePlate": "ABC 123",
    "makeModel": "Honda CR-V",
    "lastKnownLocation": {
      "latitude": 38.8977,
      "longitude": 77.0365
    },
    "note": "Gate code 123"
  },
  "orderTotal": {
    "subtotal": 11.97,
    "claimedSubtotal": 0,
    "discount": 1,
    "tax": 1.1,
    "tip": 2,
    "deliveryFee": 5,
    "total": 19.07,
    "couponCode": "VWXYZ98765"
  },
  "orderTotalV2": {
    "customerTotal": {
      "foodSales": {
        "breakdown": [
          {
            "subType": "VALUE",
            "name": "sales tax.",
            "value": 3.4
          }
        ]
      },
      "feeForRestaurantProvidedDelivery": {
        "breakdown": [
          {
            "subType": "VALUE",
            "name": "sales tax.",
            "value": 3.4
          }
        ]
      },
      "restaurantFundedDiscount": {
        "breakdown": [
          {
            "subType": "VALUE",
            "name": "sales tax.",
            "value": 3.4
          }
        ]
      },
      "tipForRestaurant": {
        "breakdown": [
          {
            "subType": "VALUE",
            "name": "sales tax.",
            "value": 3.4
          }
        ]
    },
    "adjustments": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "packingFee": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "bagFee": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "serviceProviderDiscount": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "tipForServiceProviderCourier": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "feeForServiceProviderDelivery": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "smallOrderFee": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "serviceFee": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "otherFee": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "couponCodes": [
      "string"
    ]
  },
  "customerPayment": {
    "customerPaymentDue": 1,
    "customerPrepayment": 1,
    "customerAmountToReturn": 1,
    "paymentDueToRestaurant": 1
  },
  "serviceProviderCharge": {
    "salesTaxWithheld": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "commission": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "processingFee": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "deliveryFeeForRestaurant": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "chargesAdjustments": {
      "breakdown": [
        {
          "subType": "VALUE",
          "name": "sales tax.",
          "value": 3.4
        }
      ]
    },
    "otherFees": {
        "breakdown": [
            {
              "subType": "VALUE",
              "name": "sales tax.",
              "value": 3.4
            }
          ]
        }
      },
      "payout": {
        "payoutFromServiceProvider": 1,
        "payoutFrom3rdParty": 1,
        "cashPayout": 1
      }
    },
    "customerPayments": [
      {
        "value": 2,
        "processingStatus": "COLLECTABLE",
        "paymentMethod": "CASH"
      }
    ],
    "fulfillmentInfo": {
      "pickupTime": "2007-12-03T10:15:30+01:00",
      "deliveryTime": "2007-12-03T10:15:30+01:00",
      "fulfillmentMode": "DELIVERY",
      "schedulingType": "ASAP",
      "courierStatus": "COURIER_ASSIGNED"
    },
    "orderIssues": [
      {
        "issueDetail": {
          "id": "69f60a06-c335-46d9-b5a1-97f1a211c514",
          "acknowledged": true,
          "note": "Ran out of cheese.",
          "noteKey": "GENERIC_ISSUE"
        },
        "issueType": "GENERIC",
        "menuReconciliationFailed": {
          "MenuReconciliationFailedAttempt": [
            {
              "menuReconciliationFailedReason": "UNKNOWN",
              "menuReconciliationMethod": "UNKNOWN"
            }
          ]
        },
        "customerOrderStateViolated": {
          "stateMachine": "UNKNOWN",
          "unexpectedState": "string"
        },
        "stationOrderStateViolated": {
          "stateMachine": "UNKNOWN",
          "unexpectedState": "string",
          "stationId": "string"
        },
        "missingData": {
          "type": "UNKNOWN"
        },
        "canceled": {
          "source": "UNKNOWN"
        },
        "scheduledTaskFailed": {
          "task": "UNKNOWN",
          "phase": "UNKNOWN"
        },
        "notActivated": {
          "stationId": "string",
          "activationTrigger": {
            "manualActivation": {},
            "immediateActivation": {},
            "TimedActivation": {
                "activateAt": "2007-12-03T10:15:30+01:00"
              }
            }
          },
          "rejected": {
            "source": "UNKNOWN"
          }
        }
      ]
    }
      