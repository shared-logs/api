<?php
/** User */

namespace Battis\SharedLogs\Objects;

use Battis\SharedLogs\AbstractObject;

/**
 * A user
 *
 * Users are the authors of log entries
 *
 * @author Seth Battis <seth@battis.net>
 */
class User extends AbstractObject
{
    /** The canonical field name for references to user objects in the database */
    const ID = 'user_id';

    /** Minimum length of a `screen_name` */
    const SCREEN_NAME_MINIMUM_LENGTH = 3;

    /**
     * Prepare the User object for JSON serialization
     *
     * The password field is obscured.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $result = parent::jsonSerialize();
        unset($result['password']);
        return $result;
    }
}
