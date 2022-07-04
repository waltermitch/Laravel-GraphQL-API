<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute must be between :min and :max.',
        'string' => 'The :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'cateringOrderInput.items.create.*.menuItem' => [
            'required' => 'The menu item field is required.',
            'max' => 'The menu item must not be greater than :max characters.'
        ],
        'cateringOrderInput.items.create.*.price' => [
            'regex' => 'The price format is invalid.',
        ],
        'cateringOrderInput.items.create.*.ext' => [
            'regex' => 'The ext format is invalid.',
        ],

        'cateringOrderInput.items.update.*.menuItem' => [
            'filled' => 'The menu item field must have a value.',
            'max' => 'The menu item must not be greater than :max characters.'
        ],
        'cateringOrderInput.items.update.*.price' => [
            'regex' => 'The price format is invalid.',
        ],
        'cateringOrderInput.items.update.*.ext' => [
            'regex' => 'The ext format is invalid.',
        ],

        'PurchaseInput.items.create.*.amount' => [
            'regex' => 'The amount format is invalid.',
        ],
        'PurchaseInput.items.create.*.glAccount.connect' => [
            'required' => 'The gl account field is required.',
            'exists' => 'The selected gl account is invalid.',
        ],
        'PurchaseInput.items.create.*.inventoryCategory.connect' => [
            'required' => 'The inventory category field is required.',
            'exists' => 'The selected inventory category is invalid.',
        ],
        'PurchaseInput.items.update.*.amount' => [
            'regex' => 'The amount format is invalid.',
        ],
        'PurchaseInput.items.update.*.glAccount.connect' => [
            'required' => 'The gl account field is required.',
            'exists' => 'The selected gl account is invalid.',
        ],
        'PurchaseInput.items.update.*.inventoryCategory.connect' => [
            'required' => 'The inventory category field is required.',
            'exists' => 'The selected inventory category is invalid.',
        ],

        'registerCloseoutInput.items.create.*.glAccountId' => [
            'required' => 'The gl account field is required.',
        ],
        'registerCloseoutInput.items.create.*.amount' => [
            'regex' => 'The amount format is invalid.',
        ],
        'registerCloseoutInput.items.update.*.glAccountId' => [
            'filled' => 'The gl account field must have a value.',
        ],
        'registerCloseoutInput.items.update.*.amount' => [
            'regex' => 'The amount format is invalid.',
        ],

        'termInput.vendors.sync.*' => [
            'exists' => 'The selected vendor is invalid.',
        ],
        'termInput.vendors.syncWithoutDetaching.*' => [
            'exists' => 'The selected vendor is invalid.',
        ],
        'termInput.vendors.disconnect.*' => [
            'exists' => 'The selected vendor is invalid.',
        ],

        'unitInput.users.sync.*' => [
            'exists' => 'The selected user is invalid.',
        ],
        'unitInput.users.syncWithoutDetaching.*' => [
            'exists' => 'The selected user is invalid.',
        ],
        'unitInput.users.disconnect.*' => [
            'exists' => 'The selected user is invalid.',
        ],

        'unitInput.vendors.sync.*' => [
            'exists' => 'The selected vendor is invalid.',
        ],
        'unitInput.vendors.syncWithoutDetaching.*' => [
            'exists' => 'The selected vendor is invalid.',
        ],
        'unitInput.vendors.disconnect.*' => [
            'exists' => 'The selected vendor is invalid.',
        ],

        'unitInput.glAccounts.sync.*' => [
            'exists' => 'The selected gl account is invalid.',
        ],
        'unitInput.glAccounts.syncWithoutDetaching.*' => [
            'exists' => 'The selected gl account is invalid.',
        ],
        'unitInput.glAccounts.disconnect.*' => [
            'exists' => 'The selected gl account is invalid.',
        ],

        'vendorInput.terms.sync.*' => [
            'exists' => 'The selected term is invalid.',
        ],
        'vendorInput.terms.syncWithoutDetaching.*' => [
            'exists' => 'The selected term is invalid.',
        ],
        'vendorInput.terms.disconnect.*' => [
            'exists' => 'The selected term is invalid.',
        ],

        'input.units.*' => [
            'exists' => 'The selected unit is invalid.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'cateringOrderInput.description' => 'description',
        'cateringOrderInput.phoneNumber' => 'phone number',
        'cateringOrderInput.orderBy' => 'order by',
        'cateringOrderInput.orderFor' => 'order for',
        'cateringOrderInput.tax' => 'tax',
        'cateringOrderInput.shipToName' => 'ship to name',
        'cateringOrderInput.shipToAddress' => 'shipt to address',
        'cateringOrderInput.billToName' => 'bill to name',
        'cateringOrderInput.billToAddress' => 'bill to address',
        'cateringOrderInput.chargeNumber' => 'charge number',

        'cityInput.name' => 'name',
        'cityInput.tax' => 'tax',
        'cityInput.state.connect' => 'state',

        'countyInput.name' => 'name',
        'countyInput.tax' => 'tax',
        'countyInput.state.connect' => 'state',

        'districtInput.name' => 'name',
        'districtInput.code' => 'code',

        'expenseInput.comments' => 'comments',
        'expenseInput.expenseDate' => 'expense date',
        'expenseInput.glAccount.connect' => 'gl account',
        'expenseInput.expenseType.connect' => 'expense type',
        'expenseInput.amount' => 'amount',
        'expenseInput.vendor.connect' => 'vendor',

        'expenseTypeInput.type' => 'type',
        'expenseTypeInput.description' => 'description',

        'fixedExpenseInput.comments' => 'comments',
        'fixedExpenseInput.glAccount.connect' => 'gl account',
        'fixedExpenseInput.amount' => 'amount',
        'fixedExpenseInput.monthly' => 'monthly',

        'GlAccountInput.name' => 'name',
        'GlAccountInput.glTypeCode.connect' => 'gl type code',
        'GlAccountInput.parent.connect' => 'parent gl account',

        'GlTypeCodeInput.code' => 'code',
        'GlTypeCodeInput.description' => 'description',

        'inventoriesInput.id' => 'inventory',
        'inventoriesInput.amount' => 'amount',

        'inventoryCategoryInput.name' => 'name',
        'inventoryCategoryInput.vending' => 'vending',
        'inventoryCategoryInput.glAccount.connect' => 'gl account',

        'periodInput.periodEnd' => 'period end',
        'periodInput.year' => 'year',
        'periodInput.month' => 'month',
        'periodInput.week' => 'week',

        'PurchaseInput.number' => 'number',
        'PurchaseInput.vendor.connect' => 'vendor',

        'registerInput.code' => 'code',
        'registerInput.name' => 'name',
        'registerInput.bank' => 'bank',
        'registerInput.nonResetable' => 'non resetable',
        'registerInput.commission' => 'commission',
        'registerInput.registerType.connect' => 'register type',
        'registerInput.unit.connect' => 'unit',

        'registerCloseoutInput.nonResetable' => 'non resetable',
        'registerCloseoutInput.netTotal' => 'net total',
        'registerCloseoutInput.lastNonResetable' => 'last non resetable',
        'registerCloseoutInput.netOV' => 'net OV',
        'registerCloseoutInput.totalToDistribute' => 'total to distribute',
        'registerCloseoutInput.netCharge' => 'net charge',
        'registerCloseoutInput.taxFromTheTape' => 'tax from the tape',
        'registerCloseoutInput.netVoucher' => 'net voucher',
        'registerCloseoutInput.overringVoidTax' => 'overring void tax',
        'registerCloseoutInput.netCash' => 'net cash',
        'registerCloseoutInput.chargeTax' => 'charge tax',
        'registerCloseoutInput.voucherTax' => 'voucher tax',
        'registerCloseoutInput.cashTax' => 'cash tax',
        'registerCloseoutInput.totalPettyCash' => 'total tetty cash',
        'registerCloseoutInput.actualCashDeposit' => 'actual cash deposit',
        'registerCloseoutInput.calculatedCashDeposit' => 'calculated cash deposit',
        'registerCloseoutInput.overShort' => 'over short',
        'registerCloseoutInput.customerCountBreakfast' => 'customer count breakfast',
        'registerCloseoutInput.netSalesBreakfast' => 'net sales breakfast',
        'registerCloseoutInput.customerCountLunch' => 'customer count lunch',
        'registerCloseoutInput.netSalesLunch' => 'net sales lunch',
        'registerCloseoutInput.customerCountDinner' => 'customer count dinner',
        'registerCloseoutInput.netSalesDinner' => 'net sales dinner',
        'registerCloseoutInput.customerCountTotals' => 'customer count totals',
        'registerCloseoutInput.netSalesTotals' => 'net sales totals',
        'registerCloseoutInput.closeDate' => 'close date',
        'registerCloseoutInput.netSalesTotals' => 'net sales totals',
        'registerCloseoutInput.closeDate' => 'close date',
        'registerCloseoutInput.register.connect' => 'register',

        'registerTypeInput.name' => 'name',
        'registerTypeInput.description' => 'description',
        'registerTypeInput.taxType' => 'tax type',
        'registerTypeInput.isVending' => 'is vending',

        'stateInput.code' => 'code',
        'stateInput.salesTaxCafeteria' => 'sales tax cafeteria',
        'stateInput.salesTaxVending' => 'sales tax vending',
        'stateInput.salesTaxRestaurant' => 'sales tax restaurant',
        'stateInput.salesTaxStore' => 'sales tax store',
        'stateInput.grossReceiptsTax' => 'gross receipts tax',

        'termInput.name' => 'name',
        'termInput.discPercent' => 'disc percent',
        'termInput.discDays' => 'disc days',
        'termInput.dueDays' => 'due days',

        'unitInput.code' => 'code',
        'unitInput.name' => 'name',
        'unitInput.address' => 'address',
        'unitInput.zip' => 'zip',
        'unitInput.payrollPassword' => 'payroll password',
        'unitInput.emailAccount' => 'email account',
        'unitInput.managementPercent' => 'management percent',
        'unitInput.managementAmount' => 'management amount',
        'unitInput.managementFeeType' => 'management fee type',
        'unitInput.administrativePercent' => 'administrative percent',
        'unitInput.administrativeAmount' => 'administrative amount',
        'unitInput.administrativeFeeType' => 'administrative fee type',
        'unitInput.supportPercent' => 'support percent',
        'unitInput.supportAmount' => 'support amount',
        'unitInput.supportFeeType' => 'support fee type',
        'unitInput.payrollTaxPercent' => 'payroll tax percent',
        'unitInput.benefitsPercent' => 'benefits percent',
        'unitInput.benefitsAmount' => 'benefits amount',
        'unitInput.vacationAmount' => 'vacation amount',
        'unitInput.businessInsuranceAmount' => 'business insurance amount',
        'unitInput.vendingIncome' => 'vending income',
        'unitInput.commissionAmount' => 'commission amount',
        'unitInput.commissionPercent' => 'commission percent',
        'unitInput.managerFirstName' => 'manager first name',
        'unitInput.managerLastName' => 'manager last name',
        'unitInput.sysco' => 'sysco',
        'unitInput.unitType.connect' => 'unit type',
        'unitInput.district.connect' => 'district',
        'unitInput.county.connect' => 'county',
        'unitInput.city.connect' => 'city',

        'unitTypeInput.name' => 'name',

        'userInput.firstName' => 'first name',
        'userInput.lastName' => 'last name',
        'userInput.email' => 'email',

        'vendorInput.code' => 'code',
        'vendorInput.name' => 'name',

        'input.period' => 'period',
        'input.district' => 'district',
        'input.unit' => 'unit',

        'credentials.email' => 'email',
        'forgotPasswordInput.email' => 'email',
        'forgotPasswordInput.resetPasswordUrl' => 'reset password url',
        'resetPasswordInput.email' => 'email',
        'resetPasswordInput.passwordConfirmation' => 'password confirmation',
    ],

];
