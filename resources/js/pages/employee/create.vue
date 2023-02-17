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
                        v-model="formData.first_name"
                        :rules="nameRules"
                        label="First Name"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="formData.last_name"
                        :rules="nameRules"
                        label="Last Name"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="formData.second_name"
                        :rules="nameRules"
                        label="Second Name"
                    ></v-text-field>

                    <v-text-field
                        v-model="formData.card_id"
                        :rules="cardIdRules"
                        label="Card ID"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="formData.work_time_start"
                        :rules="timeRules"
                        label="Work Time Start"
                        required
                    ></v-text-field>

<!--                    <v-time-picker v-model="formData.work_time_start" label="Work Time Start" format="24hr" required></v-time-picker>-->

                    <v-text-field
                        v-model="formData.work_time_end"
                        :rules="timeRules"
                        label="Work Time End"
                        required
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

export default {
    name: "create",
    data() {
        return {
            dialog: false,
            formData: {
                first_name: '',
                last_name: '',
                second_name: '',
                card_id: '',
                work_time_start: '',
                work_time_end: '',
            },
        }
    },
    computed: {
        nameRules() {
            return [
                v => !!v || 'Name is required',
                v => v && v.length <= 50 || 'Name must be less than 50 characters',
            ];
        },
        cardIdRules() {
            return [
                v => !!v || 'Card ID is required',
                v => /^([0-9a-fA-F]{2} ){5}([0-9a-fA-F]{2})$/.test(v) || 'Card ID must be like `2f a2 34 ef 4f 24`'
            ];
        },
        timeRules() {
            return [
                v => !!v || 'Time is required',
                v => /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/.test(v) || 'Invalid time format. HH:mm:ss'
            ];
        },
    },
    methods: {
        async validate() {
            const {valid} = await this.$refs.form.validate();
        },
        async saveForm() {
            const {valid} = await this.$refs.form.validate();
            if (!valid) return;

            this.$http.post('api/employee', this.formData)
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
