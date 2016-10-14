<?php

include(dirname(__FILE__) . '/GetUsersListHelpers.php');

class GetUsersListMapper {

    public static function getUserList() {

        $db_user = new Database;

        $query_list_users = " SELECT " . DB_PREFIX . " username, email FROM users";
        return $list_users = $db_user->fetchAll($query_list_users);

    }
    
}