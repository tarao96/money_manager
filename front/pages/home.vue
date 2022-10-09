<template>
<div class="contents">
    <div class="row">
        <side-bar></side-bar>
        <div class="contents-wrapper">
            <h1 class="home-title">ようこそ、マネーマネージャーへ！</h1>

            <div class="create-wrapper">
                <h2>カンタン収支登録</h2><br>
                <form @submit.prevent="createMoney">
                    <div class="category-select">
                        <label for="category">分類：</label>
                        <select class="form-control" v-model="selected">
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
                    <div class="button">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>

            <div class="today-wrapper">
                <h2>本日の支出</h2>
                <div class="row justify-content-center">
                    <table class="table table-hover">
                        <tbody>
                            <tr v-for="category in categories" :key="category.id">
                                <th>{{ category.name }}</th>
                                <td>{{ category.value }}円</td>
                                <td>{{ category.body }}</td>
                                <td><button class="btn btn-success">編集</button></td>
                                <td><button class="btn btn-danger">削除</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="doughnut-chart">
                        <doughnut-chart></doughnut-chart>
                    </div>
                </div>
            </div>

            <div class="money-sort-wrapper">
                <h2>最近の大きな出費</h2>
                <table class="table table-hover">
                    <tbody>
                        <tr v-for="category in categories" :key="category.id">
                            <th>{{ category.name }}</th>
                            <td>{{ category.value }}円</td>
                            <td>{{ category.body }}</td>
                            <td><button class="btn btn-success">編集</button></td>
                            <td><button class="btn btn-danger">削除</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="month-wrapper">
            <h2>今月の支出</h2>
            <div class="row justify-content-center">
                <table class="table table-hover">
                    <tbody>
                        <tr v-for="category in categories" :key="category.id">
                            <th>{{ category.name }}</th>
                            <td>{{ category.value }}円</td>
                            <td><button class="btn btn-success">編集</button></td>
                            <td><button class="btn btn-danger">削除</button></td>
                        </tr>
                    </tbody>
                </table>
                <div class="doughnut-chart">
                    <doughnut-chart></doughnut-chart>
                </div>
            </div>
            </div>

            <div class="month-transition-wrapper">
                <h2>今月の入出金の推移</h2>
                <div class="line-chart">
                    <graph-chart></graph-chart>
                </div>
            </div>

            <div class="year-wrapper">
                <h2 class="table-title">今年の月間収支一覧</h2>
                <table class="table table-hover">
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
                
                <div class="bar-chart">
                    <bar-chart></bar-chart>
                </div>
            </div>

            <div class="articles-wrapper">
                <h2>節約に関するおすすめ記事</h2>
                <div class="article-contents">
                    <div v-for="article in articles" :key="article.id" class="article-box">
                        <img :src="article.img" alt="記事画像" />
                        <a href="#">{{ article.title }}</a>
                        <p>{{ article.body }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</template>

<script>
// サイドバーコンポーネント
import SideBar from "@/components/SideBar.vue";

// チャート系コンポーネント
import DoughnutChart from "@/components/DoughnutChart.vue";
import BarChart from "@/components/BarChart.vue";
import GraphChart from "@/components/LineChart.vue";


export default({
    components: {
        SideBar,
        DoughnutChart,
        BarChart,
        GraphChart,
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
                {id: 1, name: '食費', value: 2000, body: '昼食、夕食、お菓子'},
                {id: 2, name: '日用品', value: 1000, body: '生理用品類'},
                {id: 3, name: '趣味・娯楽', value: 1500, body: 'ポケカ代'},
                {id: 4, name: '交際費', value: 3000, body: '飲み会代'},
                {id: 5, name: '交通費', value: 500, body: '近くの飲み場に飲みに行った'},
                {id: 6, name: '衣服・美容', value: 2200, body: 'ユニクロで服購入'},
                {id: 7, name: '健康・医療', value: 3000, body: '美容化粧品類'},
                {id: 8, name: '自動車', value: 4000, body: '駐車場代'}
            ],
            articles: [
                {id: 1, img: require('@/assets/images/image01.jpg'), title: '節約テクニック5選', body: '節約のテクニックを解説していきます。'},
                {id: 2, img: require('@/assets/images/image02.jpg'), title: '節約テクニック5選', body: '節約のテクニックを解説していきます。'},
                {id: 3, img: require('@/assets/images/image03.jpg'), title: '節約テクニック5選', body: '節約のテクニックを解説していきます。'},
                {id: 4, img: require('@/assets/images/image04.jpg'), title: '節約テクニック5選', body: '節約のテクニックを解説していきます。'},
                {id: 5, img: require('@/assets/images/image05.jpg'), title: '節約テクニック5選', body: '節約のテクニックを解説していきます。'},
            ]
        }
    },
})
</script>

<style lang="scss">
* {
    margin: 0;
    padding: 0;
}

.contents {
    background-color: rgba(237, 233, 233, 0.639);
    color: #191970;
}

.contents-wrapper {
    width: 1300px;
    margin: 0 auto;
    padding-left: 50px;
    .home-title {
        text-align: center;
        margin-top: 50px;
    }
}

.create-wrapper {
    padding: 30px;
    background-color: rgba(175, 172, 172, 0.635);
    border-radius: 15px;
    box-shadow: 2px 5px 3px rgb(143, 141, 141);
    width: 50%;
    margin: 50px auto;
    .category-select {
        margin-bottom: 20px;
        display: flex;
        select {
            width: 120px;
        }
        label {
            padding-top: 5px;
        }
    }
    input {
        width: 50%;
        margin-bottom: 20px;
        padding: 5px;
    }
    .money-input {
        display: flex;
        label {
            padding-top: 5px;
        }
    }
    .button {
        text-align: center;
    }
    form button {
        padding: 5px 10px;
        color: white;
        margin: 0 auto;
    }
}

.today-wrapper {
    margin: 100px 0;
    text-align: center;
    border: 2px solid black;
    padding: 50px;
    background-color: #f2e6da42;
    border-radius: 15px;
    box-shadow: 5px 5px 3px rgba(171, 168, 168, 0.896);
    table {
        width: 50%;
        margin: 50px 0;
    }
}

.money-sort-wrapper {
    margin: 100px 0;
    text-align: center;
    border: 2px solid black;
    padding: 50px;
    box-shadow: 5px 3px 3px rgba(189, 183, 183, 0.784);
    background-color: #f2e6da42;
    border-radius: 15px;
    table {
        margin-top: 50px;
    }
}

.month-wrapper {
    margin-top: 100px;
    text-align: center;
    border: 2px solid black;
    padding: 50px;
    box-shadow: 5px 3px 3px rgba(189, 183, 183, 0.784);
    background-color: #f2e6da42;
    border-radius: 15px;
    table {
        width: 40%;
        margin: 50px 0;
    }
}

.month-transition-wrapper {
    margin-top: 100px;
    text-align: center;
    border: 2px solid black;
    padding: 50px;
    background-color: #fff;
    box-shadow: 5px 3px 3px rgba(189, 183, 183, 0.784);
    background-color: #f2e6da42;
    border-radius: 15px;
}

.year-wrapper {
    margin: 100px auto;
    border: 2px solid black;
    padding: 50px;
    box-shadow: 5px 3px 3px rgba(189, 183, 183, 0.784);
    background-color: #f2e6da42;
    border-radius: 15px;
    .table-title {
        text-align: center;
    }
    table {
        width: 100%;
        margin: 50px auto;
        height: 300px;
        .blank {
            width: 100px;
            text-align: center;
            padding-top: 20px;
        }
        thead tr th {
            padding-top: 10px;
        }
        tbody tr td {
            font-size: 0.9rem;
            padding-top: 20px;
        }
    }
}

.doughnut-chart {
    width: 50%;
    height: 50%;
    margin: auto;
}

.bar-chart {
    width: 80%;
    margin: 0 auto;
}

.line-chart {
    width: 80%;
    margin: 50px auto;
}

.articles-wrapper {
    margin: 100px auto;
    text-align: center;
    border: 2px solid black;
    padding: 50px;
    box-shadow: 5px 3px 3px rgba(189, 183, 183, 0.784);
    background-color: #f2e6da42;
    border-radius: 15px;
}

.article-contents {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    margin-top: 50px;
    img {
        width: 50%;
    }
}

.article-box {
    border: 2px solid black;
    padding: 20px;
    width: 30vw;
}

</style>
