
<section class="content" id="addBorrower">
	<div class="box">
		<div class="box-header">
			<i class="fa fa-plus"></i> <h3 class="box-title">Borrower</h3>
		</div>
		<div class="box-body">
			<div class="row">
                <div class="col-md-12" v-if="turn === 'Borrower'">
                    <h3>{{ contents.borrower.display }}</h3>
                    <lte-input v-for="field in contents.borrower.fields" :size="field.size" :placeholder="field.placeholder"  :text="field.text" :type="field.type" :required="field.required" :tag="field.tag" :options="field.options" :disabled="field.disabled" v-model="field.value"></lte-input>
                </div>
				<div class="col-md-12" v-if="turn === 'Spouse' && spouse">
                    <h3>{{ contents.spouse.display }}</h3>
                    <lte-input v-for="field in contents.spouse.fields" :size="field.size" :placeholder="field.placeholder"  :text="field.text" :type="field.type" :required="field.required" :tag="field.tag" :options="field.options" :disabled="field.disabled" v-model="field.value"></lte-input>
					<button @click="spouse = false" class="btn btn-primary">Remove Spouse</button>
                </div>
				<div class="col-md-6" v-if="turn === 'IncomeExpense'">
                    <h3>{{ contents.income.display }}</h3>
                    <lte-input v-for="field in contents.income.fields" :size="field.size" :placeholder="field.placeholder"  :text="field.text" :type="field.type" :required="field.required" :tag="field.tag" :options="field.options" :disabled="field.disabled" v-model="field.value"></lte-input>
                </div>
				<div class="col-md-6" v-if="turn === 'IncomeExpense'">
                    <h3>{{ contents.expense.display }}</h3>
                    <lte-input v-for="field in contents.expense.fields" :size="field.size" :placeholder="field.placeholder"  :text="field.text" :type="field.type" :required="field.required" :tag="field.tag" :options="field.options" :disabled="field.disabled" v-model="field.value"></lte-input>
                </div>
				<div class="col-md-12" v-if="turn === 'Spouse' && !spouse">
                    <h3>{{ contents.spouse.display }}</h3>
					<button @click="spouse = true" class="btn btn-primary">Add Spouse</button>
                </div>
            </div>
			<!-- <div class="row">
                <div v-for="(content, index) in contents" v-if="index !== 'borrower' && index !== 'spouse'" class="col-md-6">
                    <h3>{{ content.display }}</h3>
                    <lte-input v-for="field in content.fields" :size="field.size" :placeholder="field.placeholder"  :text="field.text" :type="field.type" :required="field.required" :tag="field.tag" :options="field.options" :disabled="field.disabled" v-model="field.value"></lte-input>
                </div>
            </div> -->
		</div>
		<div class="box-footer">
			<button @click="back" v-if="turn !== 'Borrower'" class="btn btn-primary">Back</button>
			<button @click="next" class="pull-right btn btn-primary" :disabled="proceedDisabled">{{proceedText}}</button>
		</div>
	</div>
</section>