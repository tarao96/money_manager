<template>
    <div>
        <div class="body">
            <div class="box">
                <form @submit.prevent="login" class="form">
                    <h2>Sign in</h2>
                    <div class="inputBox">
                        <input type="text" v-model="auth.email" required="required">
                        <span>Email</span>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input type="password" v-model="auth.password" required="required">
                        <span>Password</span>
                        <i></i>
                    </div>
                    <input type="submit" value="Sign in">
                </form>
            </div>
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

<style lang="scss">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #23242a;
}

.box {
    position: relative;
    width: 380px;
    height: 420px;
    background: #1c1c1c;
    border-radius: 8px;
    overflow: hidden;
}

.box::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 380px;
    height: 420px;
    background: linear-gradient(0deg, transparent, #45f3ff, #45f3ff);
    transform-origin: bottom right;
    animation: animate 6s linear infinite; 
}

.box::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 380px;
    height: 420px;
    background: linear-gradient(0deg, transparent, #45f3ff, #45f3ff);
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
    animation-delay: -3s;
}

// アニメーション
@keyframes animate
{
    0% 
    { 
        transform: rotate(0deg); 
    }
    100%
    {
        transform: rotate(360deg);
    }

}

.form {
    position: absolute;
    inset: 2px;
    border-radius: 8px;
    background: #28292d;
    z-index: 10;
    padding: 50px 40px;
    display: flex;
    flex-direction: column;
}

.form h2 {
    color: #45f3ff;
    font-weight: 500;
    text-align: center;
    letter-spacing: 0.1em;
}

.inputBox {
    position: relative;
    width: 300px;
    margin-top: 35px;
    input {
        position: relative;
        width: 100%;
        padding: 20px 10px 10px;
        background: transparent;
        border: none;
        outline: none;
        color: #23242a;
        font-size: 1em;
        letter-spacing: 0.05em;
        z-index: 10;
    }
    span {
        position: absolute;
        left: 0;
        padding: 20px 0 10px;
        font-size: 1em;
        color: #8f8f8f;
        pointer-events: none;
        letter-spacing: 0.05em;
        transition: 0.5s;
    }
    input:valid ~ span,
    input:focus ~ span {
        color: #45f3ff;
        transform: translateX(0px) translateY(-34px);
        font-size: 0.75em;
    }
    i {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background: #45f3ff;
        border-radius: 4px;
        transition: 0.5s;
        pointer-events: none;
        z-index: 9;
    }
    input:valid ~ i,
    input:focus ~ i {
        height: 44px;
    }
}

input[type="submit"] {
    border: none;
    outline: none;
    background: #45f3ff;
    padding: 11px 25px;
    width: 100px;
    margin-top: 30px;
    border-radius: 4px;
    font-weight: 600;
    cursor: pointer;
}

input[type="submit"]:active {
    opacity: 0.8;
}
</style>
