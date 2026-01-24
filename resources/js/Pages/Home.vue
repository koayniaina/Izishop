<script>
import AppLayout from '../Layouts/App.vue'
import HeroBanner from './HeroBanner.vue'
import ServiceBar from '../components/ServiceBar.vue'

export default {
  name: 'Home',
  components: {
    AppLayout,
    HeroBanner,
    ServiceBar,
  },
}
</script>

<template>
  <AppLayout>
    <HeroBanner />
    <ServiceBar />
  </AppLayout>
</template>
