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
        checkBeforeProceed(){
            string = this.turn.toLowerCase()
            if(string == 'spouse'&&this.spouse == false){
                return true
            }
            if(string == 'incomeexpense'){
                array = ['income','expense']
            }else{
                array = [string]
            }
            for(key in array){
                if(!this.checkTheRequireds(array[key])){
                    alertify.notify("Required Fields should be filled in.","error")
                    return false
                }
            }
            return true
        },
        next(){
            if(!this.checkBeforeProceed()){
                return
            }
            if(this.turn == 'Borrower'){
                this.turn = 'Spouse'
                this.proceedText = "Next"
            }else
            if(this.turn == 'Spouse'){
                this.turn = 'IncomeExpense'
                this.proceedText = "Finish"
            }else 
            if(this.turn == 'IncomeExpense'){
                this.addBorrower()
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
        },
        getToInsertSelect(what,array){
            axios.post(`application/controllers/borrower.controller.php`, 
            {
                type: `get-${what}-data`
            }).then(response => {
                for(i in array){
                    this["contents"][array[i]]["fields"][what]["options"] = response.data
                }
                this["contents"][array[i]]["fields"][what]["options"].unshift({value:'',display:`Select ${what}`})
            })
        },
        addBorrower(){
            this.proceedText = "Adding borrower.."
            this.proceedDisabled = true
            contents = this.contents
            axios.post(`application/controllers/borrower.controller.php`, 
            {
                type: `add-data`,
                contents : contents
            }).then(response => {
                
            })
        }
    },
    created() {
        this.setUpWatchers(this.contents.income.fields,'income');
        this.setUpWatchers(this.contents.expense.fields,'expense');
        this.getToInsertSelect('employer',['borrower','spouse'])
        this.getToInsertSelect('comaker',['borrower'])
    },
    watch: {
        spouse : function(){
            this.contents.spouse.insert = this.spouse
        }
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
                        db: 'fName'
                    },
                    middlename :{
                        text : 'Middle Name',
                        value : '',
                        db: 'mName'
                    },
                    lastname :{
                        text : 'Last Name',
                        value : '',
                        db: 'lName'
                    },
                    birthdate :{
                        text : 'Birthdate',
                        value : '',
                        placeholder: 'YYYY-MM-DD',
                        type : 'date',
                        size: '3',
                        db: 'bDay'
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
                        size: '2',
                        db: 'gender'
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
                        size: '3',
                        db: 'civilStatus'
                    },
                    presentaddress :{
                        text : 'Present Address',
                        value : '',
                        size: '4',
                        db: 'presentAddr'
                    },
                    homeaddress :{
                        text : 'Home Address',
                        value : '',
                        db: 'homeAddr'
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
                        size: '2',
                        db: 'ownHouse'
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
                        size: '2',
                        db: 'renting'
                    },
                    lengthofstay :{
                        text : 'Length Of Stay',
                        value : '',
                        type : 'number',
                        size: '2',
                        db: 'lengthOfStay'
                    },
                    numberofchildren :{
                        text : 'Number Of Children',
                        value : '',
                        type : 'number',
                        size: '2',
                        db: 'noOfChildren'
                    },
                    occupation :{
                        text : 'Occupation',
                        value : '',
                        db: 'occupation'
                    },
                    validid :{
                        text : 'Valid ID',
                        value : '',
                        db: 'validID'
                    },
                    contactnumber :{
                        text : 'Contact Number',
                        value : '',
                        db: 'contactNo'
                    },
                    employer :{
                        text : 'Employer',
                        value : '',
                        tag : 'select',
                        options : {},
                        size: '12',
                        db: 'empID'
                    },
                    comaker :{
                        text : 'Comaker',
                        value : '',
                        tag : 'select',
                        options : {},
                        size: '8',
                        db: 'comakerID'
                    },
                    numberofloans :{
                        text : 'Number Of Loans',
                        value : '',
                        type : 'number',
                        size: '4',
                        db: 'loanCount'
                    }
                }
            },
            spouse : {
                display: `Spouse's Information`,
                insert: false,
                fields: {
                    name :{
                        text : 'Name of Spouse',
                        value : '',
                        db: 'name'
                    },
                    birthdate :{
                        text : 'Birthdate',
                        value : '',
                        placeholder: 'YYYY-MM-DD',
                        type : 'date',
                        size: '12',
                        db: 'bDay'
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
                        size: '6',
                        db: 'civilStatus'
                    },
                    presentaddress :{
                        text : 'Present Address',
                        value : '',
                        db: 'presentAddr'
                    },
                    homeaddress :{
                        text : 'Home Address',
                        value : '',
                        db: 'homeAddr'
                    },
                    occupation :{
                        text : 'Occupation',
                        value : '',
                        db: 'occupation'
                    },
                    salaryorincome :{
                        text : 'Salary Or Income',
                        value : '',
                        type: 'number',
                        db: 'salaryOrIncome'
                    },
                    validid :{
                        text : 'Valid ID',
                        value : '',
                        db : 'validID'
                    },
                    contactnumber :{
                        text : 'Contact Number',
                        value : '',
                        db : 'contactNo'
                    },
                    employer :{
                        text : 'Employer',
                        value : '',
                        tag : 'select',
                        options : {},
                        size: '12',
                        db: 'employerID'
                    }
                }
            },
            income : {
                display: `Source Of Income`,
                db: 'borrower_income',
                fields: {
                    incomeorsalary :{
                        text : 'Income Or Salary',
                        value : "",
                        size : '6',
                        type : 'number',
                        db: 'incomeOrSalary'
                    },
                    otherincome :{
                        text : 'Other Income',
                        value : "",
                        size : '6',
                        type : 'number',
                        db: 'otherIncome'
                    },
                    otherincomedetails :{
                        text : 'Other Income Details',
                        value : "",
                        size : '12',
                        db: 'otherIncome'
                    },
                    netincome :{
                        text : '[Total Income (0.00) - Total Expenses (0.00)] =',
                        value : "",
                        placeholder: 'Net Income',
                        disabled : true,
                        required: false,
                        size : '12',
                        db: 'netIncome'
                    }
                }
            },
            expense : {
                display: `Expenses`,
                db: 'borrower_expense',
                fields: {
                    food :{
                        text : 'Food',
                        value : "",
                        type: 'number',
                        size: '6',
                        db: 'food'
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