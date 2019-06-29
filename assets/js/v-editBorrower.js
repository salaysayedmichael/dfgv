var editBorrower = new Vue({
    el: '#editBorrower',
    computed: {
        netIncome: function(){
            totalIncome = Number(this.contents.income.fields.incomeorsalary.value) + Number(this.contents.income.fields.otherincome.value)

            totalExpenses = Number(this.contents.expense.fields.food.value) + Number(this.contents.expense.fields.bills.value) + Number(this.contents.expense.fields.education.value) + Number(this.contents.expense.fields.rentals.value) + Number(this.contents.expense.fields.repairormaintenance.value) + Number(this.contents.expense.fields.miscellaneous.value)

            this.contents.income.fields.netincome.text = `[Total Income (${totalIncome}.00) - Total Expenses (${totalExpenses}.00)] =`
            this.contents.income.fields.netincome.value = Number(totalIncome) - Number(totalExpenses)
        }
    },
    methods:{
        isEmpty(obj) {
            for(var prop in obj) {
              if(obj.hasOwnProperty(prop)) {
                return false;
              }
            }
          
            return JSON.stringify(obj) === JSON.stringify({});
        },
        editBorrower(){
            contents = this.contents
            axios.post(`application/controllers/borrower.controller.php`, 
            {
                type: `save-data`,
                contents : contents
            }).then(response => {
                data = response.data
                message = "<ul>";
                for(x in data){
                    if(data[x]){
                        message += `<li>The ${x} successfully saved.</li>`
                    }else{
                        message += `<li>Failed to save ${x}.</li>`
                    }
                }
                message += "<ul>";
                alertify.alert('Message', message,
                function(){ 
                    window.location.replace("?p=borrower") 
                })
            })
        },
        finish(){
            this.disabled = true
            this.text = "Saving borrower.."
            this.editBorrower()
        },
        setUpWatchers(array,name) {
            for (let i in array) {
                let key = `contents.${name}.fields.${i}.value`;
                this.$watch(key, function() {
                    this.netIncome
                });
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
                this["contents"][array[i]]["fields"][what]["options"].unshift({value:'',display:`Select ${what}`,selected:true})
            })
        },
        fillInData(id){
            tables = ['borrower','spouse','income','expense']
            axios.post(`application/controllers/borrower.controller.php`, 
            {
                type: `get-data`,
                id: id,
                tables: tables
            }).then(response => {
                data = response.data
                console.log(data)
                if(data.length != 0){
                    for(var table in data){
                        for(var field in data[table][0]){
                            for(var x in this.contents[table]['fields']){
                                if(this.contents[table]['fields'][x]['db'] == field){
                                    this.contents[table]['fields'][x]['value'] = data[table][0][field]
                                }
                            }
                        }
                    }
                    if ((data['spouse'] === undefined || data['spouse'].length == 0)==false) {
                        this.contents.spouse.handler = false
                        this.contents.spouse.insert = true
                    }
                }else{
                    // window.location.replace("?p=borrower") 
                }
            })
        }
    },
    created() {
        this.setUpWatchers(this.contents.income.fields,'income');
        this.setUpWatchers(this.contents.expense.fields,'expense');
        this.getToInsertSelect('employer',['borrower','spouse'])
        this.getToInsertSelect('comaker',['borrower'])
        const urlParams = new URLSearchParams(window.location.search)
        const id = urlParams.get('id')
        this.fillInData(id)
        this.contents.id = id
    },
    data: function(){
        return {
            order: {
                0 : ['borrower'],
                1 : ['spouse'],
                2 : ['income','expense']
            },
            text:'Next',
            disabled:false,
            contents : {
                id : '',
                db : 'borrowerID',
                borrower : {
                    display: `Borrower's Information`,
                    parent: true,
                    fields: {
                        firstname :{
                            text : 'First Name',
                            value : '',
                            db: 'fName'
                        },
                        middlename :{
                            text : 'Middle Name',
                            value : '',
                            db: 'mName',
                            required: false
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
                                    value: 'separated',
                                    display: 'Legally Separated'
                                },
                                3:{
                                    value: 'widowed',
                                    display: 'Widowed'
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
                            db: 'empID',
                            addable: {
                                handler: true,
                                text: 'Add Employer',
                                link: '#add-employer-modal',
                                modal:true
                            }
                        },
                        comaker :{
                            text : 'Comaker',
                            value : '',
                            tag : 'select',
                            options : [],
                            size: '8',
                            db: 'comakerID',
                            addable: {
                                handler: true,
                                text: 'Add Comaker',
                                link: '#add-comaker-modal',
                                modal:true
                            }
                        },
                        numberofloans :{
                            text : 'Number Of Loans',
                            value : '',
                            type : 'number',
                            size: '4',
                            db: 'loanCount',
                            required: false
                        }
                    }
                },
                spouse : {
                    display: `Spouse's Information`,
                    insert: false,
                    handler: true,
                    fields: {
                        name :{
                            text : 'Name of Spouse',
                            value : '',
                            size : '12',
                            db: 'name'
                        },
                        birthdate :{
                            text : 'Birthdate',
                            value : '',
                            placeholder: 'YYYY-MM-DD',
                            type : 'date',
                            size: '2',
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
                                    value: 'separated',
                                    display: 'Legally Separated'
                                },
                                3:{
                                    value: 'widowed',
                                    display: 'Widowed'
                                }
                            },
                            size: '2',
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
                            size: '4',
                            db: 'homeAddr'
                        },
                        occupation :{
                            text : 'Occupation',
                            value : '',
                            size: '6',
                            db: 'occupation'
                        },
                        salaryorincome :{
                            text : 'Salary Or Income',
                            value : '',
                            size: '6',
                            type: 'number',
                            db: 'salaryOrIncome'
                        },
                        validid :{
                            text : 'Valid ID',
                            value : '',
                            size: '6',
                            db : 'validID'
                        },
                        contactnumber :{
                            text : 'Contact Number',
                            value : '',
                            size: '6',
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
                            db: 'otherIncomeDetails',
                            required: false,
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
                            size: '6',
                            db: 'bills'
                        },
                        education :{
                            text : 'Education',
                            value : "",
                            type: 'number',
                            size: '6',
                            db: 'education'
                        },
                        rentals :{
                            text : 'Rentals',
                            value : "",
                            type: 'number',
                            size: '6',
                            db: 'rental'
                        },
                        repairormaintenance :{
                            text : 'Repair Or Maintenance',
                            value : "",
                            type: 'number',
                            size: '6',
                            db: 'repairMaintenance'
                        },
                        miscellaneous :{
                            text : 'Miscellaneous',
                            value : "",
                            type: 'number',
                            size: '6',
                            db: 'misc'
                        }
                    }
                }
            }
        }
    }
})