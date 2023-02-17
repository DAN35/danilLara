<template>
    <v-sheet>
        <v-card>
            <v-card-title>
                Settings
                <server-create
                @save="loadServers"/>
            </v-card-title>
            <v-card-text>
                <v-data-table
                    :headers="columns"
                    :items="items">

                </v-data-table>
            </v-card-text>
        </v-card>

    </v-sheet>
</template>

<script>
import ServerCreate from "./server/create.vue"

export default {
    components: {ServerCreate,},
    data() {
        return {
            columns: [
                {title: 'Name', key: 'name'},
                {title: 'IP', key: 'ip'},
                {title: 'Port', key: 'port'},
                {title: 'Bucket', key: 'bucket'},
                {title: 'API Key', key: 'api_key'},
            ],
            items: [
                // {name: 'Server 1', ip: '89.33.91.148', port: '17956', bucket: 'omnis', api_key: '2lQGmAXF9jkc10a4pLdN6yP5O8bztvxE'},
                // {name: 'Server 2', ip: '147.229.21.42', port: '17956', bucket: 'omnis', api_key: '2lQGmAXF9jkc10a4pLdN6yP5O8bztvxE'},
                // {name: 'Server 3', ip: '89.33.91.148', port: '17956', bucket: 'omnis', api_key: '2lQGmAXF9jkc10a4pLdN6yP5O8bztvxE'},
                ]
        }
    },
    mounted() {
        this.loadServers();
    },
    methods: {
        loadServers() {
            this.loading = true;

            window.axios.get('/api/server').then(response => {
                this.items = response.data
            });

            this.loading = false;
        }
    }
}
</script>
