<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาลัยสงฆ์ราชบุรี');
        $this->migrator->add('general.site_logo', 'logo.png');
        $this->migrator->add('general.site_description', 'มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาลัยสงฆ์ราชบุรี');
        $this->migrator->add('general.email', 'rbr@mcu.ac.th');
        $this->migrator->add('general.phone', '0810143946, 0962303902');
        $this->migrator->add('general.address', '109 หมู่ 7 ตำบล แพงพวย อำเภอดำเนินสะดวก ราชบุรี 70130');
        $this->migrator->add('general.facebook', 'https://facebook.com');
        $this->migrator->add('general.twitter', 'https://twitter.com');
        $this->migrator->add('general.instagram', 'https://instagram.com');
        $this->migrator->add('general.google_map', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.7770594036224!2d99.94385541487131!3d13.61042389043903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2d8d7f8e827f1%3A0x60b82b5a8cce99ce!2z4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4Liq4LiH4LiG4LmM4Lij4Liy4LiK4Lia4Li44Lij4Li1IOC4oeC4q-C4suC4p-C4tOC4l-C4ouC4suC4peC4seC4ouC4oeC4q-C4suC4iOC4uOC4rOC4suC4peC4h-C4geC4o-C4k-C4o-C4suC4iuC4p-C4tOC4l-C4ouC4suC4peC4seC4og!5e0!3m2!1sth!2sth!4v1669815712050!5m2!1sth!2sth" width="1440" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>');
    }
}
