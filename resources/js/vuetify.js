import {createVuetify} from "vuetify";
import 'vuetify/styles'
import '@mdi/font/css/materialdesignicons.css'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import {VDataTable} from 'vuetify/labs/VDataTable'


export default createVuetify({
    ssr: true,
    components: {...components, VDataTable},
    directives,
});
