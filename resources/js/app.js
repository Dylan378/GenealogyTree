import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import GenealogyTree from './components/GenealogyTree.vue'

const app = createApp()
app.component('genealogy-tree', GenealogyTree)
app.component('example-component', ExampleComponent)
app.mount('#app');