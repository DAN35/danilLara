<template>
    <v-app>
        <v-app-bar
            density="compact"
        >
            <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>Application</v-toolbar-title>
        </v-app-bar>


        <v-navigation-drawer
            class="bg-indigo-darken-4"
            theme="dark"
            v-model="drawer"
            temporary
        >
            <v-list density="compact" nav>
                <v-list-item v-for="item in items"
                             :prepend-icon="item.icon"
                             :title="item.title"
                             :to="item.to"/>
            </v-list>

            <template v-slot:append>
                <div class="pa-2">
                    <v-btn block @click="logout">
                        Logout
                    </v-btn>
                </div>
            </template>
        </v-navigation-drawer>


        <v-main>
            <router-view v-slot="{ Component }">
                <component :is="Component"/>
            </router-view>
        </v-main>
    </v-app>
</template>

<script>
import axios from "axios";

export default {
    name: "App",
    data() {
        return {
            drawer: false,
            items: [
                {
                    title: "Home",
                    to: "/",
                    icon: "mdi-home"
                },
                {
                    title: "Employee",
                    to: "/employee",
                    icon: "mdi-account"
                },
                {
                    title: "Settings",
                    to: "/settings",
                    icon: "mdi-cog"
                },
                {
                    title: "Filters",
                    to: "/filters",
                    icon: "mdi-filter"
                },
            ]
        }
    },
    methods: {
        async logout() {
            await axios.post('logout')
            window.location.reload()
        }
    }
}
</script>

<style scoped>

</style>
