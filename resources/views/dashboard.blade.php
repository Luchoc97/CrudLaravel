<x-app-layout>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            <h1 class="text-3xl font-bold mb-6">

            DevBoard AI Dashboard

            </h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white dark:bg-gray-800
                rounded-xl shadow p-6">

                <h2 class="text-gray-500 proyectos">

                Total proyectos

                </h2>

                <p class="text-4xl font-bold">

                {{ $totalProjects }}

                </p>

            </div>


            <div class="bg-white dark:bg-gray-800
            rounded-xl shadow p-6">

                <h2 class="text-gray-500 proyectos">

                Finalizados

                </h2>

                <p class="text-4xl font-bold">

                {{ $completedProjects }}

                </p>

            </div>


            <div class="bg-white dark:bg-gray-800
                rounded-xl shadow p-6">

                <h2 class="text-gray-500 proyectos">

                En progreso

                </h2>

                <p class="text-4xl font-bold">

                {{ $inProgress }}

                </p>

            </div>

        </div>

        <div class="mt-10
            bg-white
            dark:bg-gray-800
            p-6
            rounded-xl
            shadow">

            <h2 class="text-xl font-bold mb-6">
                Estado de proyectos
            </h2>

            <div class="h-96">
                <canvas id="projectChart"></canvas>
            </div>

        </div>

            <div class="mt-10">

                <a
                href="{{ route('projects.index') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded btnG">

                Ver proyectos

                </a>

            </div>

        </div>
    </div>
    <script>

        document.addEventListener('DOMContentLoaded',function(){

            const ctx =document.getElementById('projectChart');

            new Chart(ctx,{

                type:'doughnut',

                data:{

                    labels:[
                        'Finalizados',
                        'En progreso'
                    ],

                    datasets:[{

                        data:[
                            {{ $completedProjects }},
                            {{ $inProgress }}
                            ],
                        

                        backgroundColor:[
                        '#78A42C',
                        '#121F3D'

                        ],

                    }],
                },

                options:{
                    responsive:true,
                    maintainAspectRatio:false
                }

            });

        });

    </script>
</x-app-layout>