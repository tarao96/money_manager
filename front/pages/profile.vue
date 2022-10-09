<template>
    <div>
        <nav-bar></nav-bar>
        <div v-if="users">
            <ul v-for="user in users" :key="user">
                <li>{{ user.name }}</li>
                <li>{{ user.email }}</li>
            </ul>
        </div>
        <!-- <button @click="fetchUsers">一覧取得</button>
        {{ users }} -->
    </div>
</template>

<script>
import axios from "axios";
import SideBar from "@/components/SideBar.vue";

export default ({
    components: {
        SideBar,
    },
    data() {
        return {
            users: []
        }
    },
    methods: {
        async fetchUsers() {
            const self = this;
            const url = "http://localhost:8000/api/users"
            const res = await axios.get(url)
                .then((res) => {
                    console.log(res.data);
                    self.users = res.data;
                })
                .catch((err) => {
                    console.log(err);
                })
        }
    },
    mounted() {
        this.fetchUsers();
    },
})
</script>
