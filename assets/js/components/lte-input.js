Vue.component('lte-input', {
    props:{
      type: {
        default: 'text'
      },
      value: {
        default: ''
      },
      text: {
        default: ''
      },
      size: {
        default: '4'
      },
      placeholder: {
        default: ''
      },
      tag: {
        default: 'input'
      },
      options: {
        default: {}
      },
      required: {
        default : true
      },
      disabled: {
        default : false
      },
      addable: {
        default : {}
      }
    },
    template: `
    <div>
      <div :class="gridSize">
          {{text}}
          <input :type="type" v-if="tag === 'input'" v-required:is="required" class="form-control" v-bind:value="value" 
                v-on:input="$emit('input', $event.target.value)" :placeholder="placeholder" :disabled="disabled">
          <select  v-if="tag === 'select'" :addable="addable" :disabled="disabled" v-required:is="required" class="form-control" v-bind:value="value"
                v-on:input="$emit('input', $event.target.value)">
              <option v-for="option in options" :value="option.value" :selected="option.selected">{{option.display}}</option>
          </select>
      </div>
      <div v-if="addable.handler" class="col-md-2">
        <button v-if="addable.modal" type="button" class="btn btn-primary" data-toggle="modal" :data-target="addable.link">
         {{addable.text}}
        </button>
        <a v-if="addable.modal==false" :href="addable.link" class="form-control" style="border:none;padding-top:29px;">{{addable.text}}</a>
      </div>
    </div>
    `,
    computed: {
      gridSize : function(){
        if(this.addable.handler){
          return `col-md-${Number(this.size) - 2}`
        }
        return `col-md-${this.size}`
      }
    }
})