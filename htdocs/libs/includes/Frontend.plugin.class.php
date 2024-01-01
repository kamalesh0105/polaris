<?


class Plugin
{


    public static function startRender()
    {
        $startTime = microtime(true);
        return $startTime;
    }

    public static function renderTime($startTime)
    {
        $stoptime = microtime(true);
        $renderTime = ($stoptime - $startTime) * 1000;
        return $renderTime;
    }
}
