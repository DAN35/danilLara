<template>
    <v-card
        class="ma-2"
        title="Employs">
        <v-card-text>

        </v-card-text>
        <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            single-line
        ></v-text-field>
        <v-data-table
            :headers="columns"
            :items="items"
            :item-class= "row_classes"
            :search="search"
            :loading="loading"
            loading-text="Loading... Please wait"
        >
            <template v-slot:item="{ item }">
                <tr :class="{'text-red': item.props.title.is_late}">
                    <td>{{ item.props.title.employee }}</td>
                    <td>{{ item.props.title.time }}</td>
                    <td>{{ item.props.title.graphic }}</td>
                </tr>
            </template>
        </v-data-table>
    </v-card>
</template>

<script>

export default {
    data() {
        return {
            search: '',
            filters: {
                employsSelect: null,
                graphicSelect: null,
                employs: [],
                graphicItems: [],
                startTime: null,
                endTime: null,
                timeList: this.generateTimeList(),
            },
            columns: [
                {title: 'Employee', key: 'employee'},
                {title: 'Time', key: 'time'},
                {title: 'Graphic', key: 'graphic'}
            ],
            loading: false,
            items: [],

        }
    },
    mounted() {
        this.loadEmployees();
    },
    watch: {
        'filters.startTime'() {
            console.log(this.filters.endTime, this.filters.startTime)
            if (this.filters.endTime < this.filters.startTime) {
                this.filters.endTime = null
            }
        }
    },
    methods: {
        // Generates an array of times from 00:00 to 23:59
        generateTimeList() {
            const times = [];
            for (let i = 0; i < 24; i++) {
                for (let j = 0; j < 60; j += 10) {
                    const time = `${i.toString().padStart(2, '0')}:${j.toString().padStart(2, '0')}`;
                    times.push(time);
                }
            }
            return times;
        },
        row_classes(item) {
            return "bg-red"; //can also return multiple classes e.g ["orange","disabled"]
            if (item.is_late) {
                return "bg-red"; //can also return multiple classes e.g ["orange","disabled"]
            }
        },
        loadEmployees() {
            this.loading = true;
            const params = {
                card_ids: this.filters.employsSelect,
                start_time: this.filters.startTime,
                end_time: this.filters.endTime,
                graphic: this.filters.graphicSelect,
            }

            window.axios.get('/api/checkin', params).then(response => {
                this.items = response.data.map((i) => {
                    const timestamp = Date.parse(i.check)
                    const time = new Date(timestamp + 15 * 60 * 1000).toLocaleTimeString()
                    return {
                    id: i.id,
                    employee: i.employee.first_name + ' ' + i.employee.last_name + ' ' + i.employee.second_name,
                    time: time,
                    graphic: i.employee.work_time_start + ' - ' + i.employee.work_time_end,
                    is_late: i.employee.work_time_start < time,
                }
                });
                this.filters.employs = [...new Set(response.data.map((i) => {return {
                    title: i.employee.first_name + ' ' + i.employee.last_name + ' ' + i.employee.second_name,
                    value: i.employee.card_id,
                }}))]
                this.filters.graphicItems = [...new Set(response.data.map((i) => {return i.employee.work_time_start + ' - ' + i.employee.work_time_end}))]
            });
            this.loading = false;
        },

    }
}
</script>
