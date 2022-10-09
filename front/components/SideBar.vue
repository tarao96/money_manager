<template>
    <div class="navigation">
        <ul>
            <li class="list active">
                <a href="/home">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">ホーム</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <span class="title">プロフィール</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                    <span class="title">収支追加</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">カテゴリ追加</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                    <span class="title">グラフ</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="help-circle-outline"></ion-icon></span>
                    <span class="title">ヘルプ</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="title">サインアウト</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>

export default({
    mounted() {
        const list = document.querySelectorAll(".list");
        function activeLink() {
            list.forEach((item) => {
                item.classList.remove("active");
            });
            this.classList.add("active");
        }

        list.forEach((item) => {
            item.addEventListener('click', activeLink);
        });
    }
})
</script>

<style scoped>
* {
    box-sizing: border-box;
}

li {
    list-style: none;
}

.navigation {
    height: 100vh;
    width: 70px;
    background-color: #4d4c86;
    box-shadow: 10px 0 0 #c77946;
    border-left: 10px solid #4d4c86;
    overflow-x: hidden;
    transition: all 0.5s;
    z-index: 1;
    position: fixed;
}

.navigation:hover {
    width: 300px;
}

.navigation ul {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding-top: 20px;
    padding-left: 10px;
}

.navigation ul li {
    display: block;
    width: 100%;
    position: relative;
    border-radius: 15px;
}

.navigation ul li:hover {
    background-color: #38376f4b;
}

.navigation ul li.active {
    background-color: #c77946;
}

.navigation ul li.active::before {
    content: "";
    position: absolute;
    width: 30px;
    height: 30px;
    top: -30px;
    right: 0;
    border-radius: 50%;
    box-shadow: 15px 15px 0 #c77946;
}

.navigation ul li.active::after {
    content: "";
    position: absolute;
    width: 30px;
    height: 30px;
    top: 60px;
    right: 0;
    border-radius: 50%;
    box-shadow: 15px -15px 0 #c77946;
}

.navigation ul li a {
    color: white;
    width: 100%;
    display: flex;
    text-decoration: none;
    position: relative;
}

.navigation ul li a .icon {
    display: block;
    min-width: 45px;
    height: 60px;
    line-height: 70px;
    text-align: center;
}

.navigation ul li a .icon ion-icon {
    font-size: 1.5rem;
}

.navigation ul li a .title {
    padding-left: 20px;
    height: 60px;
    line-height: 60px;
    white-space: nowrap;
}
</style>
