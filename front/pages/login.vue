<template>
    <div>
        <div class="container mt-5">
            <h1 class="mb-5">ログイン画面</h1>
            <form @submit.prevent="login" class="text-center card mx-auto">
                <div class="card-body">
                    <h2 class="card-title mb-5">ログイン</h2>
                    <p class="card-text"><input type="email" class="form-control" placeholder="メールアドレス" v-model="auth.email" required autofocus></p>
                    <p class="card-text"><input type="password" class="form-control" placeholder="パスワード" v-model="auth.password" required></p>
                    <p class="card-text"><a href="#">パスワードをお忘れの場合</a></p>
                    <p class="card-text"><button class="btn btn-primary" type="submit">ログイン</button></p>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default({
    data: function() {
        return {
            auth: {
                email: "",
                password: ""
            }
        }
    },

    methods: {
        async login() {
            try {
                await this.$auth.loginWith('local', {
                    data: {
                        email: this.auth.email,
                        password: this.auth.password
                    }
                });
                axios.defaults.headers.common['Authorization'] = `${this.$auth.getToken(
                    "local"
                )}`;
            } catch(err) {
                console.log(err);
            }
        }
    } 
})
</script>

<style scoped>

.card {
    width: 40vw;

}

input {
    width: 80%;
    margin: 0 auto;
}
</style>
