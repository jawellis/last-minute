<?php
namespace App\Models;

class Notice {
    public static function all() {
        return [
            [
                'id' => 1,
                'title' => 'Last minute notice',
                'description' => 'This evening'
            ],
            [
                'id' => 1,
                'title' => 'Last minute notice',
                'description' => 'This evening'
            ]
        ];
    }
    public static function find($id) {
        $notices = self::all();
        foreach($notices as $notice) {
            if($notice['id'] == $id) {
                return $notice;
            }
        }
    }
}
