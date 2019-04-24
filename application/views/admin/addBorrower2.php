
<section class="content" id="addBorrower">
	<div class="box">
		<div class="box-header">
			<i class="fa fa-plus"></i> <h3 class="box-title">Borrower</h3>
		</div>
		<div class="box-body">
			<div class="row">
                <div v-for="(content, index) in contents" v-if="index === 'borrower' || index === 'spouse'" class="col-md-6">
                    <h3>{{ content.display }}</h3>
                    <lte-input v-for="field in content.fields" :size="field.size" :placeholder="field.placeholder"  :text="field.text" :type="field.type" :required="field.required" :tag="field.tag" :options="field.options" :disabled="field.disabled" v-model="field.value"></lte-input>
                </div>
            </div>
			<div class="row">
                <div v-for="(content, index) in contents" v-if="index !== 'borrower' && index !== 'spouse'" class="col-md-6">
                    <h3>{{ content.display }}</h3>
                    <lte-input v-for="field in content.fields" :size="field.size" :placeholder="field.placeholder"  :text="field.text" :type="field.type" :required="field.required" :tag="field.tag" :options="field.options" :disabled="field.disabled" v-model="field.value"></lte-input>
                </div>
            </div>
		</div>
		<div class="box-footer">
		</div>
	</div>
</section>