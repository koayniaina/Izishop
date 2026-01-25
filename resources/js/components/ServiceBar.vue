<script setup>
import {
  Truck,
  BadgeCheck,
  CreditCard,
  Headphones,
  ShieldCheck
} from 'lucide-vue-next'

const services = [
  {
    title: 'Material Delivery',
    description: 'Fast & on-site delivery',
    icon: Truck,
  },
  {
    title: 'Quality Guarantee',
    description: 'Certified building standards',
    icon: BadgeCheck,
  },
  {
    title: 'Flexible Payment',
    description: 'Secure & transparent billing',
    icon: CreditCard,
  },
  {
    title: 'Expert Support',
    description: 'Professional project guidance',
    icon: Headphones,
  },
  {
    title: 'Worksite Safety',
    description: '100% safety compliance',
    icon: ShieldCheck,
  },
]
</script>


<template>
  <section class="services">
    <div
      v-for="(service, index) in services"
      :key="index"
      class="service"
    >
      <component :is="service.icon" class="icon" />

      <div>
        <h4>{{ service.title }}</h4>
        <p>{{ service.description }}</p>
      </div>
    </div>
  </section>
</template>

<style scoped>
.services {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  margin:  2rem;
  background: #fff;
  border: 1px solid #eee;
}

.service {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 1rem;
  border-right: 1px solid #eee;
}

.service:last-child {
  border-right: none;
}

.icon {
  width: 28px;
  height: 28px;
  color: #F5BE4B;
}

h4 {
  font-size: 14px;
  font-weight: 600;
  margin: 0;
}

p {
  font-size: 12px;
  color: #777;
  margin: 2px 0 0;
}
</style>
