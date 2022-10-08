<template>
<div class="contents">
    <div class="row">
        <side-bar></side-bar>
        <div class="contents-wrapper">
            <h1 class="home-title">ようこそ、マネーマネージャーへ！</h1>

            <div class="table-wrapper">
                <h2 class="table-title">今年の月間収支一覧</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="blank"></th>
                            <th>1月</th>
                            <th>2月</th>
                            <th>3月</th>
                            <th>4月</th>
                            <th>5月</th>
                            <th>6月</th>
                            <th>7月</th>
                            <th>8月</th>
                            <th>9月</th>
                            <th>10月</th>
                            <th>11月</th>
                            <th>12月</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="blank">固定費</th>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                            <td>12000円</td>
                        </tr>
                        <tr>
                            <th class="blank">変動費</th>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                            <td>20000円</td>
                        </tr>
                        <tr>
                            <th class="blank">収入</th>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                            <td>200000円</td>
                        </tr>
                        <tr>
                            <th class="blank">収入ー支出</th>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                            <td>168000円</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="create-wrapper">
                <h2>収支登録</h2><br>
                <form @submit.prevent="createMoney">
                    <div class="category-select">
                        <label for="category">分類</label>
                        <select v-model="selected">
                            <option disabled value=""></option>
                            <option v-for="option in options" :key="option.id" :value="option.name">{{ option.name }}</option>
                        </select>
                    </div>
                    <div class="money-input">
                        <label for="money">金額：</label>
                        <input type="text" class="form-control" placeholder="金額を入力してください">
                    </div>
                    <div class="money-input">
                        <label for="content">内容：</label>
                        <input type="text" class="form-control" placeholder="内容を入力してください">
                    </div>
                    <button type="submit" class="btn btn-primary">登録</button>
                </form>
            </div>

            <div class="today-money">
                <h2>本日の収支</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th v-for="category in categories" :key="category.id">{{ category.name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td v-for="categoryValue in categoryValues" :key="categoryValue.id">{{ categoryValue.value }}円</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import SideBar from "@/components/SideBar.vue";

export default({
    components: {
        SideBar,
    },
    data() {
        return {
            selected: '',
            options: [
                {id: 1, name: '食費'},
                {id: 2, name: '日用品'},
                {id: 3, name: '趣味・娯楽'},
                {id: 4, name: '交際費'},
                {id: 5, name: '交通費'},
                {id: 6, name: '衣服・美容'},
                {id: 7, name: '健康・医療'},
                {id: 8, name: '自動車'}
            ],
            categories: [
                {id: 1, name: '食費'},
                {id: 2, name: '日用品'},
                {id: 3, name: '趣味・娯楽'},
                {id: 4, name: '交際費'},
                {id: 5, name: '交通費'},
                {id: 6, name: '衣服・美容'},
                {id: 7, name: '健康・医療'},
                {id: 8, name: '自動車'}
            ],
            categoryValues: [
                {id: 1, value: 1500},
                {id: 2, value: 1500},
                {id: 3, value: 1500},
                {id: 4, value: 1500},
                {id: 5, value: 1500},
                {id: 6, value: 1500},
                {id: 7, value: 1500},
                {id: 8, value: 1500}
            ]
        }
    }
})
</script>

<style scoped>
* {
    margin: 0;
    padding: 0;
    color: #191970;
}

.contents {
    background-color: #5fb1a3;
}

.contents-wrapper {
    width: 1100px;
    margin: 0 auto;
}

.contents-wrapper .home-title {
    text-align: center;
    margin-top: 50px;
}

.table-wrapper {
    margin: 100px auto;
}

.table-wrapper .table-title {
    text-align: center;
}

.table-wrapper table {
    width: 100%;
    margin: 20px auto;
}

.table-wrapper table .blank {
    width: 100px;
    text-align: center;
    padding-top: 10px;
}

.table-wrapper table tbody tr td {
    font-size: 0.9rem;
}

.create-wrapper {
    padding: 30px;
    background-color: rgba(175, 172, 172, 0.635);
}

.create-wrapper .category-select {
    margin-bottom: 20px;
}

.create-wrapper input {
    width: 20%;
    margin-bottom: 20px;
    padding: 5px;
}

.create-wrapper button {
    padding: 5px 10px;
}

.create-wrapper .money-input {
    display: flex;
}

.create-wrapper .money-input label {
    padding-top: 5px;
}

.create-wrapper form button {
    color: white;
}

.today-money {
    margin-top: 50px;
}

.today-money table {
    margin-bottom: 50px;
}


</style>
