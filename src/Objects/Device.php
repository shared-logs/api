<?php
/** Device */

namespace Battis\SharedLogs\Objects;

use Battis\SharedLogs\Exceptions\ObjectException;
use Battis\SharedLogs\AbstractObject;

/**
 * A device
 *
 * Devices are documented by logs of timestamped entries authored by users
 *
 * @property Url[] urls
 * @property Log[] logs
 * @author Seth Battis <seth@battis.net>
 */
class Device extends AbstractObject
{
    /** Suppress list of logs sub-object */
    const SUPPRESS_LOGS = false;

    const SUPPRESS_URLS = false;

    /** Canonical field name for references to devices in the database */
    const ID = 'device_id';

    /**
     * Construct a device from a database record
     *
     * @param array $databaseRecord Associative array of fields
     * @param Log[]|false $logs (Optional) List of logs sub-object (or `Device::SUPPRESS_LOGS`). Elements that are not
     *        instances of Log will be ignored.
     *
     * @throws ObjectException If `$databaseRecord` contains no fields
     */
    public function __construct($databaseRecord, $logs = self::SUPPRESS_LOGS, $urls = self::SUPPRESS_URLS)
    {
        parent::__construct($databaseRecord);

        if (is_array($urls)) {
            $this->urls = array_filter($urls, function($elt) {
               return $elt instanceof Url;
            });
        }

        if (is_array($logs)) {
            $this->logs = array_filter($logs, function ($elt) {
                return $elt instanceof Log;
            });
        }
    }
}
