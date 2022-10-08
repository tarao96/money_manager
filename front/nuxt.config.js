export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'front',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ],
    script: [
      {src: "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"},
      {src: "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"}
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: ["bootstrap/dist/css/bootstrap.min.css"],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: ['@/plugins/axios'
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    'cookie-universal-nuxt'
  ],

  // Axios module configuratio  n: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: 'http://localhost:8000/api/',
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  },

  auth: {
    redirect: {
      login: '/login', 
      logout: '/login', 
      callback: false,
      home: '/dashboard'
    },
    strategies: {
        local: {
            token: {
                property: 'access_token',
                maxAge: 60 * 60,
            },
            refreshToken: {
                property: 'access_token',
                maxAge: 20160 * 60,
            },
            endpoints: {
                login: { url: '/login', method: 'post', propertyName: 'access_token' },
                logout: { url: '/logout', method: 'post' },
                refresh: { url: '/refresh', method: 'post' , propertyName: 'access_token'}, 
                user: { url: '/me', method: 'get', propertyName: false},
            }
        }
    },
  }
}
