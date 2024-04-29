import { reactive,ref, } from 'vue';
const toggles = ()=>{
  document.body.classList.toggle('toggle-sidebar')
}
const lodding = ref("<strong>Processing...</strong>");
export  {toggles,lodding};