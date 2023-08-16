<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        $users = [
            ['name' => 'Melvin O. Bonza', 'email' => 'mbonza@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 1],
            ['name' => 'Benidicta R. Tobias', 'email' => 'btobias@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 6],
            ['name' => 'Elmina DL. Monteza, MD.', 'email' => 'emonteza@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 13],
            ['name' => 'Engr. Maria Lourdes P. San Miguel', 'email' => 'msanmiguel@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 12],
            ['name' => 'Ronaldo O. Valles', 'email' => 'rvalles@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 19],
            ['name' => 'Jose H. Ardeza Jr.', 'email' => 'hardeza@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 14],
            ['name' => 'Luis M. Germina', 'email' => 'lgermina@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 8],
            ['name' => 'Pablo M. Magpily Jr.', 'email' => 'pmagpily@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 11],
            ['name' => 'Hon. Laarni A. Malibiran', 'email' => 'lmalibiran@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 20],
            ['name' => 'Leilani T. Peñarroyo', 'email' => 'lpenarroyo@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 2],
            ['name' => 'Patrocinia S. Kalaw', 'email' => 'pkalaw@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 16],
            ['name' => 'Engr. Rosaly M. Gutierrez, EnP', 'email' => 'rgutierrez@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 14],
            ['name' => 'Luna R. Policarpio', 'email' => 'lpolicarpio@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 22],
            ['name' => 'Johanne Roie B. Bonza', 'email' => 'jbonza@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 17],
            ['name' => 'Gina D. Dela Cruz', 'email' => 'gdelacruz@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 18],
            ['name' => 'Susana A. Saulon', 'email' => 'ssaulon@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 7],
            ['name' => 'Eileen S. Talabis', 'email' => 'stalabis@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 9],
            ['name' => 'Caridad P. Lorenzo', 'email' => 'clorenzo@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => 5],
        ];
        $role = Role::findByName('user');

        foreach($users as $userData) {
            $user = User::create($userData);
            $user->assignRole($role);
        }

        $bmos = [
            ['name' => 'BMO', 'email' => 'bmo@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => null],
        ];

        $admins = [
            ['name' => 'admin', 'email' => 'admin@example.net', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'department_id' => null],
        ];

        $roleAdmin = Role::findByName('admin');

        foreach($admins as $admin) {
            $bmo = User::create($admin);
            $bmo->assignRole($roleAdmin);
        }

        $roleBmo = Role::findByName('bmo');

        foreach($bmos as $bmoUser) {
            $bmo = User::create($bmoUser);
            $bmo->assignRole($roleBmo);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
