php artisan make:migration create_settings_table

<?php 

Schema::create('settings', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('settings_description');
    $table->string('settings_key');
    $table->text('settings_value');
    $table->string('settings_type');
    $table->integer('settings_must');
    $table->enum('settings_delete', ['0', '1']);
    $table->enum('settings_status', ['0', '1']);
    $table->timestamps();
});
?>

php artisan make:seeder SettingsTableSeeder

<?php 

DB::table('settings')->insert([
    [
        'settings_description' => 'title',
        'settings_key' => 'title',
        'settings_value' => 'blog title',
        'settings_type' => 'text',
        'settings_must' => 0,
        'settings_delete' => 0,
        'settings_status' => 1,
    ],
);

?>

php artisan db:seed --class=SettingsTableSeeder
php artisan make:model models\admin\Settings
