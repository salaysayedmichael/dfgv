var app = new Vue({
    el: '#addBorrower',
    computed: {
        netIncome: function(){
            totalIncome = Number(this.contents.income.fields.incomeorsalary.value) + Number(this.contents.income.fields.otherincome.value)

            totalExpenses = Number(this.contents.expense.fields.food.value) + Number(this.contents.expense.fields.bills.value) + Number(this.contents.expense.fields.education.value) + Number(this.contents.expense.fields.rentals.value) + Number(this.contents.expense.fields.repairormaintenance.value) + Number(this.contents.expense.fields.miscellaneous.value)

            this.contents.income.fields.netincome.text = `[Total Income (${totalIncome}.00) - Total Expenses (${totalExpenses}.00)] =`
            this.contents.income.fields.netincome.value = Number(totalIncome) - Number(totalExpenses)
        }
    },
    methods: {
        setUpWatchers(array,name) {
            for (let i in array) {
                let key = `contents.${name}.fields.${i}.value`;
                this.$watch(key, function() {
                    this.netIncome
                });
            }
        },
        checkTheRequireds(string){
            for (var key in this["contents"][string]["fields"]) {
                if(this["contents"][string]["fields"][key]["required"] != false){
                    if(this["contents"][string]["fields"][key]["value"] == ""){
                        return false
                    }
                }
            }
            return true
        },
        addBorrower(){
            this.proceedText = "Adding borrower.."
            this.proceedDisabled = true
        },
        next(){
            if(this.turn == 'Borrower'){
                if(this.checkTheRequireds('borrower')){
                    this.turn = 'Spouse'
                    this.proceedText = "Next"
                }else{
                    alertify.notify("You need to fill in the required fields.","error")
                }
            }else
            if(this.turn == 'Spouse'){
                if(this.spouse){
                    if(this.checkTheRequireds('spouse')){
                        this.turn = 'IncomeExpense'
                        this.proceedText = "Finish";
                    }else{
                        alertify.notify("You need to fill in the required fields.","error")
                    }
                }else{
                    this.turn = 'IncomeExpense'
                    this.proceedText = "Finish"
                }
            }else 
            if(this.turn == 'IncomeExpense'){
                if(this.checkTheRequireds('income')&&this.checkTheRequireds('expense')){
                    this.addBorrower()
                }else{
                    alertify.notify("You need to fill in the required fields.","error")
                }
            }
        },
        back(){
            if(this.turn == 'Spouse'){
                this.turn = 'Borrower'
                this.proceedText = "Next";
            }else 
            if(this.turn == 'IncomeExpense'){
                this.turn = 'Spouse'
                this.proceedText = "Next";
            }else 
            if(this.turn == 'Finish'){
                this.turn = 'IncomeExpense'
                this.proceedText = "Finish";
            }
        }
    },
    created() {
        this.setUpWatchers(this.contents.income.fields,'income');
        this.setUpWatchers(this.contents.expense.fields,'expense');
    },
    data: function (){
        return {
        spouse:false,
        turn: 'Borrower',
        proceedText: 'Next',
        proceedDisabled: false,
        contents : {
            borrower : {
                display: `Borrower's Information`,
                fields: {
                    firstname :{
                        text : 'First Name',
                        value : '',
                        db: ''
                    },
                    middlename :{
                        text : 'Middle Name',
                        value : ''
                    },
                    lastname :{
                        text : 'Last Name',
                        value : ''
                    },
                    birthdate :{
                        text : 'Birthdate',
                        value : '',
                        placeholder: 'YYYY-MM-DD',
                        type : 'date',
                        size: '3'
                    },
                    gender :{
                        text : 'Gender',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'male',
                                display: 'Male'
                            },
                            1:{
                                value: 'female',
                                display: 'Female'
                            }
                        },
                        size: '2'
                    },
                    civilstatus :{
                        text : 'Civil Status',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'single',
                                display: 'Single'
                            },
                            1:{
                                value: 'married',
                                display: 'Married'
                            },
                            2:{
                                value: 'widow',
                                display: 'Widow'
                            }
                        },
                        size: '3'
                    },
                    presentaddress :{
                        text : 'Present Address',
                        value : '',
                        size: '4'
                    },
                    homeaddress :{
                        text : 'Home Address',
                        value : ''
                    },
                    houseowner :{
                        text : 'House Owner',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'yes',
                                display: 'Yes'
                            },
                            1:{
                                value: 'no',
                                display: 'No'
                            }
                        },
                        size: '2'
                    },
                    renting :{
                        text : 'Renting?',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'yes',
                                display: 'Yes'
                            },
                            1:{
                                value: 'no',
                                display: 'No'
                            }
                        },
                        size: '2'
                    },
                    lengthofstay :{
                        text : 'Length Of Stay',
                        value : '',
                        type : 'number',
                        size: '2'
                    },
                    numberofchildren :{
                        text : 'Number Of Children',
                        value : '',
                        type : 'number',
                        size: '2'
                    },
                    occupation :{
                        text : 'Occupation',
                        value : ''
                    },
                    validid :{
                        text : 'Valid ID',
                        value : ''
                    },
                    contactnumber :{
                        text : 'Contact Number',
                        value : ''
                    },
                    employer :{
                        text : 'Employer',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'yes',
                                display: 'Yes'
                            },
                            1:{
                                value: 'no',
                                display: 'No'
                            }
                        },
                        size: '12'
                    },
                    comaker :{
                        text : 'Comaker',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'yes',
                                display: 'Yes'
                            },
                            1:{
                                value: 'no',
                                display: 'No'
                            }
                        },
                        size: '8'
                    },
                    numberofloans :{
                        text : 'Number Of Loans',
                        value : '',
                        type : 'number',
                        size: '4'
                    }
                }
            },
            spouse : {
                display: `Spouse's Information`,
                fields: {
                    name :{
                        text : 'Name of Spouse',
                        value : ''
                    },
                    birthdate :{
                        text : 'Birthdate',
                        value : '',
                        placeholder: 'YYYY-MM-DD',
                        type : 'date',
                        size: '12'
                    },
                    birthdate :{
                        text : 'Birthdate',
                        value : '',
                        placeholder: 'YYYY-MM-DD',
                        type : 'date',
                        size: '12'
                    },
                    gender :{
                        text : 'Gender',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'male',
                                display: 'Male'
                            },
                            1:{
                                value: 'female',
                                display: 'Female'
                            }
                        },
                        size: '6'
                    },
                    civilstatus :{
                        text : 'Civil Status',
                        value : '',
                        tag : 'select',
                        options : {
                            0:{
                                value: 'single',
                                display: 'Single'
                            },
                            1:{
                                value: 'married',
                                display: 'Married'
                            },
                            2:{
                                value: 'widow',
                                display: 'Widow'
                            }
                        },
                        size: '6'
                    },
                    presentaddress :{
                        text : 'Present Address',
                        value : ''
                    },
                    homeaddress :{
                        text : 'Home Address',
                        value : ''
                    },
                    occupation :{
                        text : 'Occupation',
                        value : ''
                    },
                    validid :{
                        text : 'Valid ID',
                        value : ''
                    },
                    contactnumber :{
                        text : 'Contact Number',
                        value : ''
                    }
                }
            },
            income : {
                display: `Source Of Income`,
                fields: {
                    incomeorsalary :{
                        text : 'Income Or Salary',
                        value : "",
                        size : '6',
                        type : 'number'
                    },
                    otherincome :{
                        text : 'Other Income',
                        value : "",
                        size : '6',
                        type : 'number'
                    },
                    otherincomedetails :{
                        text : 'Other Income Details',
                        value : "",
                        size : '12'
                    },
                    netincome :{
                        text : '[Total Income (0.00) - Total Expenses (0.00)] =',
                        value : "",
                        placeholder: 'Net Income',
                        disabled : true,
                        required: false,
                        size : '12'
                    }
                }
            },
            expense : {
                display: `Expenses`,
                fields: {
                    food :{
                        text : 'Food',
                        value : "",
                        type: 'number',
                        size: '6'
                    },
                    bills :{
                        text : 'Bills',
                        value : "",
                        placeholder: 'Electricity, Internet etc.',
                        type: 'number',
                        size: '6'
                    },
                    education :{
                        text : 'Education',
                        value : "",
                        type: 'number',
                        size: '6'
                    },
                    rentals :{
                        text : 'Rentals',
                        value : "",
                        type: 'number',
                        size: '6'
                    },
                    repairormaintenance :{
                        text : 'Repair Or Maintenance',
                        value : "",
                        type: 'number',
                        size: '6'
                    },
                    miscellaneous :{
                        text : 'Miscellaneous',
                        value : "",
                        type: 'number',
                        size: '6'
                    }
                }
            }
        }
    }
    }
})