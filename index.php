<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang = "ru">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compotible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, intial-scale=1.0">
        <meta name = "kaywords" content = "тематика сайта">
        <link rel = "stylesheet" href = "css\fontello.css">
        <script src="https://unpkg.com/vue@next"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script>
        <style>
          :root {
    --color1: #334249;
    --color2: #294d6e;
    --color3: #eee;
}
/*#ff7088*/
footer, section {
    padding: 30px 0;
}
header {
    position: center;
    width: 100%;
    background-color: #eee;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.forwhom {
    background-color: var(--color3);
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    margin: 70px 30px 70px;
    background: rgba(238, 238, 238, 0.7);
}

img {
    width: auto;
    max-width: 10%;
    max-height: 10%;
  }


.button {
    color: var(--color3);
    background-color: var(--color2);
    top: 1rem;
}

.about {
    background-color: #eee;
  margin: 70px 30px 70px;
}

.kontacts {
    background-color: #eee;
  margin: 70px 30px 70px;
}



    /*Цвет*/
.color1 {
    color: var(--color1)
    }
.color2 {
    color: var(--color2)
}
.color3 {
    color: var(--color3)
}

h2 {
    font-weight: 600;
    letter-spacing: 2px;
    font-size: 30px;
}
h4, li, p{
    font-size: 20px;
   font-weight: 300;
   letter-spacing: 1px;
}
.form__fieldset {
    display: flex;
    flex-direction: column;
  row-gap: 24px;
}

        </style>
    </head>
    <body>
        <header>
        </header>
    <main>
        <section class="about">
                <h1 style="text-align: center;">Капустина Кристина Александровна<br>Стажер php разработчик</h1>
        </section>

         <section class="forwhom">
                <h2 style="text-align: center;">❖ О себе ❖</h2>
                 <ul>
                   <li>Получаю высшее техническое образование<img class="middle" src="/Users/tinilita/Desktop/kapustina/kapustina_html/img/фото.JPG" alt="изображение автора"></li>
                   <li>Открыта новым знаниям</li>
                   <li>Свободно обращаюсь с командной строкой</li>
                 </ul>
                 <p style="text-align: center;">На даннный момент прохожу стажировку в компании 1с рарус</p>
         </section>

         <section class="kontacts" style="text-align: center;">
             <h2>КОНТАКТЫ</h2>
             <p>Вы можете псвязаться со мной по номеру +7 978 792 54 07 - Кристина</p>
             <div class="js-form ">
              <form v-if="state === null" submit.prevent="onclick" class="form" action="/" method="post" enctype="application/x-www-fors-urlencoded">
                <fieldset class="form__fieldset">
                  <label class="form__label">
                    <input type="text" v-model="name" class="form__input" placeholder="Имя">
                  </label>
                  <label class="form__label">
                    <input type="email" v-model="email" class="form__input" placeholder="email">
                  </label>
                  <label class="form__label">
                    <textarea v-model="textarea" class="form__input form__input--textarea"></textarea>
                  </label>
                </fieldset>
                <button class="form__submit" type="submit">Нажать</button>

                <p>{{name}}</p>
                <p>{{email}}</p>
                <p>{{textarea}}</p>
              </form>
              <div v-if="state === 201">Спасибо, форма отправлена!</div>
              <div v-if="state === 400">Форма не отправлена!</div>
            </div>
         </section>


        <footer id="footer" style="text-align: center;">
                <a href="https://vk.com/k.kapystina" target="_blank" class="button"><i class="icon-vkontakte"></i></a>
                <a href="#" target="_blank" class="button"><i class="icon-telegram"></i></a>
                <a href="#" target="_blank" class="button"><i class="icon-instagram"></i></a>
                <a href="#" target="_blank" class="button"><i class="icon-whatsapp"></i></a>
        </footer>

        <script>
Vue.createApp({
            created() {
            console.log("I'm Vue")
            },
            data: () => ({
              name: "",
              email: "",
              textarea: "",
              state: null,
            }),
            methods: {
    onclick() {
    axios.post("https://vk.com/k.kapystina", {
                data: {
        type: "users",
                  atributes: {
            name: this.name,
                    email: this.email,
                    textarea: this.textarea,
                   }
                 },
                }).then((r)=> {
        console.log(r)
                  this.state = 201;
                })
              }
            },
          }).mount('.js-form')
</script>
    </body>
</html>