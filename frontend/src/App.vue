<script setup>
import { onMounted, ref, watch } from 'vue'
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import gql from 'graphql-tag'
import { useQuery } from '@vue/apollo-composable'

const { posts, loading } = useQuery(gql`
        query {
          posts {
            data {
              id
              title
            }
          }
        }
    `)

watch(posts, value => {
    console.log(value)
})
//
// const posts = ref([])
//
// onMounted(() => {
//     fetch('http://127.0.0.1:8000/graphql', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify({
//             query: `
//         query {
//           posts {
//             data {
//               id
//               title
//             }
//           }
//         }
//       `,
//         }),
//     })
//     .then(res => res.json())
//     .then(result => {
//         console.log(result)
//         posts.value = result.data.posts.data
//     })
// })
//
// function handleMutation() {
//     fetch('http://127.0.0.1:8000/graphql', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify({
//             query: `
//         mutation {
//           createPostResolver(user_id: 1, title: "Hello from Vue", body: "content from vue") {
//             id
//             title
//           }
//         }
//       `,
//         }),
//     })
//     .then(res => res.json())
//     .then(result => {
//         alert('Post was created')
//     })
// }

</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="You did it!" />

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav>
    </div>
  </header>

    <section>
        <div v-if="loading">Loading...</div>
        <ul v-else>
            <li v-for="post in posts" :key="post.id">{{ post.title }}</li>
        </ul>
<!--        <button @click="handleMutation">Mutation</button>-->
    </section>
<!--  <RouterView />-->
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
