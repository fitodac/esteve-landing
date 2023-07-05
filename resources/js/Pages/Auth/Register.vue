<script setup>
import { onMounted, ref } from 'vue'
import { useModal } from '@/store/modalStore'
// import RegisterModal from '@/Components/Auth/RegisterModal.vue'

import PageLayout from '@/Layouts/PageLayout.vue'
import PageHeader from '@/Components/PageHeader.vue'
import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import PrimaryButton from '@/Components/Form/PrimaryButton.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import Checkbox from '@/Components/Form/Checkbox.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'


const {
	population_dropdown_options,
	specialty_dropdown_options,
    provinces_dropdown_options,
} = defineProps([
	'countries_dropdown_options',
	'provinces_dropdown_options',
	'population_dropdown_options',
	'profile_dropdown_options',
	'specialty_dropdown_options'
])

const modal = useModal()

onMounted(() => {
	modal.close()
	modal.registrationClose()
})

const form = useForm({
	usu_nombre: '',
	usu_email: '',
	usu_password: '',
	usu_password_confirmation: '',
	terms: false,
	usu_ape1: '',
	usu_ape2: '',
	usu_dni: '',
	usu_codpais: '042',
	usu_codprovestado: '',
	usu_ciudad: 'no introducido',
	usu_direccion: '',
	usu_cp: '',
	usu_telefono: '666666666',
	usu_codperfil: '',
	usu_codespecialidad: '',
	usu_codpoblacion: '',
	usu_empresa: '',
	mailing: false
});

const profile_dropdown = ref('Elige un perfil de usuario')
const country_dropdown = ref('España')
const provinces_dropdown = ref('Elige una provincia')
const population_dropdown = ref('Elige una población')
const specialty_dropdown = ref('Elige una especialidad')
let population_dropdown_options_filtered = ref('')

const triggerDropdown = (opt, dropdown) => {
	switch (dropdown) {
		case 'profile':
			profile_dropdown.value = opt.label
			form.usu_codperfil = opt.value
			break;
		case 'provinces':
			provinces_dropdown.value = opt.label
			form.usu_codprovestado = opt.value
			population_dropdown_options_filtered = population_dropdown_options.filter(
				population => population.province == opt.value
			);
			break;
		case 'population':
			population_dropdown.value = opt.label
			form.usu_codpoblacion = opt.value
			break;
        case 'specialty':
            specialty_dropdown.value = opt.label
            form.usu_codespecialidad = opt.value
            break;
	}
};

const submit = () => {
	form.post(route('register.store'), {
		onSuccess: () => {
			console.log('muchas gracias por registrarse, recibirá un correo con un enlace para verificar');
		},
		onFinish: () => {
			form.reset('password', 'password_confirmation')
		},
		onError: () => {
			if (form.errors?.duplicateEmail) {
				modal.registrationOpen()
			}
			console.debug(form.errors?.general)
		}
	});
};
</script>

<template>
	<PageLayout>
		<PageHeader>
			<div class="max-w-3xl mx-auto text-center">
				<h2 class="text-white text-2xl font-bold leading-none md:text-3xl">REGISTRO</h2>
				<div class="text-white space-y-4 mt-5">
					<p>
						Gracias por tu interés por participar en la iniciativa COLESTEROL CHALLENGE.<br>
						<strong>Por favor, introduce tus datos.</strong>
					</p>

					<p>
						Si ya estás dado de alta en el Colesterol Challenge o en ESTEVE ÁGORA, haz <Link :href="route('login')" class="font-semibold underline">log-in</Link> introduciendo tu usuario y contraseña.
					</p>
				</div>
			</div>
		</PageHeader>

		<section id="form">
			<form @submit.prevent="submit">
				<div class="max-w-3xl mx-auto px-6 py-16 3xl:px-0">

					<div>
						<InputLabel for="name" value="Nombre" />

						<TextInput
							id="name"
							type="text"
							class="mt-1 block w-full"
							v-model="form.usu_nombre"
							autocomplete="name"/>

						<InputError class="mt-2" :message="form.errors.usu_nombre" />
					</div>


					<div class="grid md:grid-cols-2 md:gap-x-5">

						<div class="mt-7">
							<InputLabel for="first_last_name" value="Primer apellido" />

							<TextInput
								id="first_last_name"
								type="text"
								class="mt-1 block w-full"
								v-model="form.usu_ape1"
								autocomplete="first_last_name"/>

							<InputError class="mt-2" :message="form.errors.usu_ape1" />
						</div>


						<div class="mt-7">
							<InputLabel for="second_last_name" value="Segundo apellido" />

							<TextInput
								id="second_last_name"
								type="text"
								class="mt-1 block w-full"
								v-model="form.usu_ape2"
								autocomplete="second_last_name"/>

							<InputError class="mt-2" :message="form.errors.usu_ape2" />
						</div>

					</div>



					<div class="grid md:grid-cols-2 md:gap-x-5">

						<div class="mt-7">
							<InputLabel for="country" value="País" />

							<Dropdown>
								<template #trigger>
									{{ country_dropdown }}
								</template>

								<template #content>
									<Option v-for="opt in countries_dropdown_options" :key="opt.value" @click="triggerDropdown(opt,'country')">{{ opt.label }}
									</Option>
								</template>
							</Dropdown>

							<InputError class="mt-2" :message="form.errors.usu_codpais" />
						</div>


						<div class="mt-7">
							<InputLabel for="province" value="Provincia" />

							<Dropdown>
								<template #trigger>
									{{ provinces_dropdown }}
								</template>

								<template #content>
									<Option v-for="opt in provinces_dropdown_options" :key="opt.value" @click="triggerDropdown(opt, 'provinces')">{{
										opt.label }}
									</Option>
								</template>
							</Dropdown>

							<InputError class="mt-2" :message="form.errors.usu_codprovestado" />
						</div>

					</div>

					<div class="mt-7">
						<InputLabel for="population" value="Población" />

						<Dropdown>
							<template #trigger>
								{{ population_dropdown }}
							</template>

							<template #content>
								<Option v-for="opt in population_dropdown_options_filtered" :key="opt.value"
									@click="triggerDropdown(opt, 'population')">{{
									opt.label }}
								</Option>
							</template>
						</Dropdown>

						<InputError class="mt-2" :message="form.errors.usu_codpoblacion" />
					</div>


					<div class="mt-7">
						<InputLabel for="address" value="Dirección" />

						<TextInput id="address" type="text" class="mt-1 block w-full" v-model="form.usu_direccion" autocomplete="address" />

						<InputError class="mt-2" :message="form.errors.usu_direccion" />
					</div>


					<div class="mt-7">
						<InputLabel for="zip" value="Código postal" />

						<TextInput id="zip" type="text" class="mt-1 block w-full" v-model="form.usu_cp" autocomplete="zip" />

						<InputError class="mt-2" :message="form.errors.usu_cp" />
					</div>


					<div class="mt-7 hidden">
						<InputLabel for="phone" value="Teléfono" />

						<TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.usu_telefono" autocomplete="phone" />

						<InputError class="mt-2" :message="form.errors.usu_telefono" />
					</div>

					<div class="grid md:grid-cols-2 md:gap-x-5">
						<div class="mt-7">
							<InputLabel value="Perfil de usuario" />

							<Dropdown>
								<template #trigger>
									{{ profile_dropdown }}
								</template>

								<template #content>
									<Option
										v-for="opt in profile_dropdown_options"
										:key="opt.value"
										@click="triggerDropdown(opt, 'profile')">{{ opt.label }}</Option>
								</template>
							</Dropdown>



							<InputError class="mt-2" :message="form.errors.usu_codperfil" />
						</div>

						<div class="mt-7">
							<InputLabel value="Especialidad" />

							<Dropdown>
								<template #trigger>{{ specialty_dropdown }}</template>

								<template #content>
									<Option
										v-for="opt in specialty_dropdown_options"
										:key="opt.value"
										@click="triggerDropdown(opt, 'specialty')">{{ opt.label }}</Option>
								</template>
							</Dropdown>
							<InputError class="mt-2" :message="form.errors.usu_codespecialidad" />
						</div>
					</div>


					<div class="mt-7">
						<InputLabel for="email" value="Email" />

						<TextInput
							id="email"
							type="email"
							class="mt-1 block w-full"
							v-model="form.usu_email"
							autocomplete="email"/>

						<InputError class="mt-2" :message="form.errors.usu_email" />
					</div>


					<div class="mt-7">
						<InputLabel for="password" value="Contraseña" />

						<TextInput
							id="password"
							type="password"
							class="mt-1 block w-full"
							v-model="form.usu_password"
							autocomplete="new-password" />

						<InputError class="mt-2" :message="form.errors.usu_password" />
					</div>


					<div class="mt-7">
						<InputLabel for="password_confirmation" value="Confirmar Contraseña" />

						<TextInput
							id="password_confirmation"
							type="password"
							class="mt-1 block w-full"
							v-model="form.usu_password_confirmation"
							autocomplete="new-password"/>

						<InputError class="mt-2" :message="form.errors.usu_password_confirmation" />
					</div>

					<div class="mt-7">
						<label class="flex items-center select-none">
							<Checkbox name="remember" v-model:checked="form.mailing" />
							<span class="ml-2 text-sm text-gray-600 cursor-pointer">
								Deseo recibir comunicaciones comerciales de parte de Esteve.
							</span>
						</label>


						<label class="flex items-center mt-3 select-none">
							<Checkbox name="remember" v-model:checked="form.terms" />
							<span class="ml-2 text-sm text-gray-600 cursor-pointer">
								He leído y acepto el
								<a
									href="https://www.esteveagora.com/es/aviso-legal"
									target="_blank"
									class="text-brand-green hover:underline">
									Aviso Legal
								</a>
								y la
								<a
									href="https://www.esteveagora.com/es/privacidad"
									target="_blank"
									class="text-brand-green hover:underline">
									Política de privacidad
								</a>
							</span>
						</label>

						<InputError class="mt-2" :message="form.errors.terms" />


						<label class="flex items-center mt-3 select-none">
							<Checkbox name="isDoctor" />
							<span class="ml-2 text-sm text-gray-600 cursor-pointer">
								Declaro que soy profesional sanitario facultado para prescribir o dispensar medicamentos en España
							</span>
						</label>
					</div>

					<div class="mt-10 flex justify-center">
						<button class="bg-brand-orange text-white font-bold leading-tight px-20 py-2.5 transition-all select-none rounded hover:opacity-90">Enviar</button>
					</div>

				</div>
			</form>
		</section>
	</PageLayout>


	<Teleport to="body">
		<RegisterModal />
	</Teleport>

</template>


<style lang="scss" scoped>
#form{
	@apply mt-0;
}

.form-footer{
	@apply bg-[#F2F0F4] mt-12 mb-20;
}
</style>
