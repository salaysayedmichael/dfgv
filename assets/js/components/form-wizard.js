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
Vue.component('form-wizard', {
    props:[
        'title',
        'contents',
        'order',
        'disabled',
        'text'
    ],
    template: `
      <div class="box">
        <div class="box-header">
          <h2 class="box-title">{{title}}</h2>
        </div>
        <div class="box-body">
            <div class="row">
              <div class="col-md-12">
               <i>Fields in <span style="color:red">red</span> are required.</i>
              </div>
            </div>
            <div class="row" v-for="(order,name) in order" v-if="turn == name">
              <div :class="containerSize(name)" v-for="orderName in order">
                <h4>{{contents[orderName].display}}</h4>
                <button @click="toggleInsert(orderName)" class="btn btn-primary pull-right" v-if="handlerCheck(contents[orderName].handler)" >{{insertoggletext}}</button>
                <lte-input v-if="insertable(contents[orderName].insert)" v-for="field in contents[orderName].fields" :size="field.size" :placeholder="field.placeholder"  :text="field.text" :type="field.type" :required="field.required" :tag="field.tag" :options="field.options" :disabled="field.disabled" v-model="field.value"></lte-input>
              </div>
            </div>
        </div>
        <div class="box-footer">
          <button @click="back" class="btn btn-primary" v-if="turn != 0" >Back</button>
          <button @click="next" class="pull-right btn btn-primary" :disabled="disabled" >{{text}}</button>
        </div>
      </div>
    `,
    computed: {
        last: function(){
          return Number(this.length(this.order)) - 1;
        }
    },
    watch: {
      text: {
        immediate: true, 
        handler () {}
      }
    },
    methods: {
        length(object) {
            var length = 0;
            for( var key in object ) {
                if( object.hasOwnProperty(key) ) {
                    ++length;
                }
            }
            return length;
        },
        containerSize: function(i){
          return `col-md-${12 / Number(this.length(this.order[i]))}`
        },
        handlerCheck: function(bool){
          if(typeof bool === undefined){
            return false
          }else{
            return bool
          }
        },
        toggleInsert(page){
          this.contents[page].insert = !this.contents[page].insert
          if(this.insertoggletext=='Add'){
            this.insertoggletext = "Remove"
          }else{
            this.insertoggletext = "Add"
          }
        },
        insertable: function(bool){
            if(bool === undefined){
              return true
            }else{
              return bool
            }
        },
        checkProceed(){
            if(this.turn == this.last){
                this.text = "Finish"
            }else{
                this.text = "Next"
            }
        },
        checkRequireds(){
          for(key in this.order[this.turn]){
            if(this.insertable(this["contents"][this.order[this.turn][key]].insert)){
              for (var field in this["contents"][this.order[this.turn][key]]["fields"]) {
                if(this["contents"][this.order[this.turn][key]]["fields"][field]["required"] != false){
                  if(this["contents"][this.order[this.turn][key]]["fields"][field]["value"] == ""){
                      alertify.notify("Required Fields should be filled in.","error")
                      return true
                  }
                }
              }
            }
          }
          return false
        },
        next(){
            if(this.checkRequireds()){
              return
            }
            if(this.turn != this.last){
              this.turn++
            }else{
              this.$emit('finish')
            }
            this.checkProceed()
        },
        back(){
            if(this.turn!=0){
                this.turn--
            }
            this.checkProceed()
        }
    },
    created: function(){
      this.checkProceed()
    },
    data: function(){
        return {
            turn: 0,
            insertoggletext: 'Add'
        }
    }
})
