<?php

/*
| General Helpers.
|
| @author Rudianto Tiofan <rudiantotiofan@gmail.com>
*/

if (! function_exists('user_info')) {
    /**
     * Get logged user info.
     *
     * @param  string $column
     * @return mixed
     */
    function user_info($column = null)
    {
        if ($user = Sentinel::check()) {
            if (is_null($column)) {
                return $user;
            }

            if ('full_name' == $column) {
                return user_info('first_name').' '.user_info('last_name');
            }

            if ('role' == $column) {
                return user_info()->roles[0];
            }

            return $user->{$column};
        }

        return null;
    }
}

if (! function_exists('link_to_avatar')) {
    /**
     * Generates link to avatar.
     *
     * @param  null|string $path
     * @return string
     */
    function link_to_avatar($path = null)
    {
        if (is_null($path)) {
            return Config::get('avatar.url_placeholder');
        }

        return avatar_path($path);
    }
}

if (! function_exists('avatar_path')) {
    /**
     * Generates avatars path.
     *
     * @param  null|string $path
     * @return string
     */
    function avatar_path($path = null)
    {
        $link = Config::get('avatar.url_avatar');

        if (is_null($path)) {
            return $link;
        }

        return $link.'/'.trim($path, '/');
    }
}

if (! function_exists('datatables')) {
    /**
     * Shortcut for Datatables::of().
     *
     * @param  mixed $builder
     * @return mixed
     */
    function datatables($builder)
    {
        return Datatables::of($builder);
    }
}

if (! function_exists('eform_datetime')) {
    /**
     * Generate new datetime from configured format datetime.
     *
     * @param  string $datetime
     * @return string
     */
    function eform_datetime($datetime)
    {
        return date(env('APP_DATE_FORMAT', 'd M Y H:i:s'), strtotime($datetime));
    }
}

if (! function_exists('ahloo_form_title')) {
    /**
     * Generate title for form.
     *
     * @param  int    $id
     * @return string
     */
    function ahloo_form_title($id = 0)
    {
        return $id > 0 ? 'edit' : 'add';
    }
}

if (! function_exists('has_access')) {
    /**
     * Check if user has access.
     *
     * @param  array|string  $permissions
     * @param  bool          $any
     * @return bool
     */
    function has_access($permissions, $any = false)
    {
        $method = 'hasAccess';
        if ($any) {
            $method = 'hasAnyAccess';
        }

        if ((bool) user_info('role')->is_super_admin) {
            return true;
        }

        return Sentinel::check()->{$method}($permissions);
    }
}

/**
 * Generator Code
 *
 * @author Rudianto Tiofan <rudiantotiofan@gmail.com
 * @param $digit
 * @return string
 **/
 if (! function_exists('generator_code')) {

    function generator_code( $digit ) {
        $i = 0;
        $code = "";

        while ($i <= $digit) {
            $code = rand(pow(10, $digit-1), pow(10, $digit)-1);
            $i++;
        }

        return $code;
    }

 }

if (! function_exists('saveImage')) {
    /**
     * saveImage.
     *
     * @param  file             $image
     * @param  string           $folder
     * @return string name
     */
    function saveImage($image, $folder)
    {
        $path = \Config::get('image.path').$folder.'/';
        $filename = $folder.'-'.time() . '.' . $image->getClientOriginalExtension();
        $image->move( $path , $filename);
        $pathThumbnail = $path.'thumbnail/';
        \File::makeDirectory($pathThumbnail, 0777, true, true);
        \Image::make($path.$filename)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($pathThumbnail.$filename);

        return $filename;
    }
}

function getnotif(){
    $notif = Notification::where('type_of_transaction', 'Pendaftaran Approved')->get();
    return $notif;
}