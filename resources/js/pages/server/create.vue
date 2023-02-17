<template>
        <v-dialog
            v-model="dialog"
            persistent
            width="auto"
        >
            <template v-slot:activator="{ props }">
                <v-btn
                    color="primary"
                    v-bind="props"
                    icon="mdi-plus"
                >
                </v-btn>
            </template>
            <v-card>
                <v-card-title class="text-h5">
                    Add a new Server
                </v-card-title>
                <v-card-text>
                    <v-form ref="form">
                        <v-text-field
                            label="Name"
                            v-model="formData.name"
                            :rules="nameRules"
                        ></v-text-field>
                        <v-text-field
                            label="IP"
                            v-model="formData.ip"
                            :rules="ipRules"
                        ></v-text-field>
                        <v-text-field
                            label="Port"
                            v-model="formData.port"
                            :rules="portRules"
                        ></v-text-field>
                        <v-text-field
                            label="Bucket"
                            v-model="formData.bucket"
                            :rules="bucketRules"
                        ></v-text-field>
                        <v-text-field
                            label="API Key"
                            v-model="formData.api_key"
                            :rules="apiKeyRules"
                        ></v-text-field>
                    </v-form>
                </v-card-text>
                <v-card-actions>
<!--                    <v-spacer></v-spacer>-->
                    <v-btn
                        color="red-darken-1"
                        variant="text"
                        @click="dialog = false"
                    >
                        Disagree
                    </v-btn>
                    <v-btn
                        color="green-darken-1"
                        variant="text"
                        @click="saveForm"
                    > Save
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
</template>

<script>
const formData = {
    name: '',
    ip: '',
    port: '',
    bucket: '',
    api_key: '',
}
export default {
    data () {
        return {
            dialog: false,
            formData: {...formData}
        }
    },
    computed: {
        nameRules() {
            return [
                v => !!v || 'Name is required',
                v => v && v.length <= 50 || 'Name must be less than 50 characters',
            ]
        },
        ipRules() {
            return [
                v => !!v || 'IP is required',
                v => /^([0-9]{1,3}\.){3}[0-9]{1,3}$/.test(v) || 'Invalid IP address',
            ]
        },
        portRules() {
            return [
                v => !!v || 'Port is required',
                v => /^\d+$/.test(v) || 'Port must be a number',
                v => v >= 0 && v <= 65535 || 'Invalid port number',
            ]
        },
        bucketRules() {
            return [
                v => !!v || 'Bucket is required',
                v => v && v.length <= 50 || 'Bucket must be less than 50 characters',
            ]
        },
        apiKeyRules() {
            return [
                v => !!v || 'API Key is required',
                v => v && v.length == 32 || 'API Key must be 32 characters',
            ]
        },
    },
    methods: {
        async validate () {
            const { valid } = await this.$refs.form.validate();
        },
        async saveForm () {
            const { valid } = await this.$refs.form.validate();
            if (!valid) return;

            this.$http.post('api/server', this.formData)
                .then((response) => {
                console.log('Form data saved successfully');
            })
                .catch((error) => {
                    console.log('Error saving form data: ', error);
                });
            this.dialog = false;
            this.$emit('save');
            this.$refs.form.reset();
        }
    }
}
</script>

<style scoped>

</style>
