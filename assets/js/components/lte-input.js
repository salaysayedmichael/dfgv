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
      }
    },
    template: `
      <div :class="gridSize">
          {{text}}
          <input :type="type" v-if="tag === 'input'" v-required:is="required" class="form-control" v-bind:value="value" 
                v-on:input="$emit('input', $event.target.value)" :placeholder="placeholder" :disabled="disabled">
          <select  v-if="tag === 'select'" :disabled="disabled" v-required:is="required" class="form-control" v-bind:value="value"
                v-on:input="$emit('input', $event.target.value)">
              <option v-for="option in options" :value="option.value">{{option.display}}</option>
          </select>
      </div>
    `,
    computed: {
      gridSize : function(){
        return `col-md-${this.size}`
      }
    }
})