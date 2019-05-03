Vue.directive('required', {
  bind: function(el, binding){
      checkInput = function(){
          if(binding.arg == 'is'){
            if(!binding.value){
                return
            }
          }
          value = ""
          event = ""
          if(el.tagName=="INPUT"){
              event = 'input' 
              if(el.getAttribute("type")=="text"){
                value = el.value
              }else if(el.getAttribute("type")=="date"){
                event = 'change' 
                value = el.value
              }else{
                event = 'input' 
                value = el.value
              }
          }else
          if(el.tagName=="SELECT"){
              event = 'change'  
              value = el.value
          }
          if(value === ""){
              el.classList.add("v-required")
          }else{
              el.classList.remove("v-required")
          } 
      }
      checkInput()
      el.addEventListener('input', checkInput)
  }
})