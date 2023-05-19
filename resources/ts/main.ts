import {createApp} from 'vue'
import App from './App.vue'
import Router from "./Router";

const app = createApp(App)
const router = Router;

app.use(router)
app.mount('#app')
