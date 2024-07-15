<?php
date_default_timezone_set('Asia/Shanghai');

$current_time = date('H:i');
$current_day = date('N');
$current_date = date('Y-m-d');

$day_names = [
    1 => '一',
    2 => '二',
    3 => '三',
    4 => '四',
    5 => '五',
    6 => '六',
    7 => '日',
];
$current_day_name = $day_names[$current_day];

$math_time = ['start' => '08:00', 'end' => '09:30'];
$english_time = ['start' => '09:40', 'end' => '11:50'];
$bio_time = ['start' => '15:00', 'end' => '16:30'];
$geo_time = ['start' => '16:40', 'end' => '18:00'];
$politics_time = ['start' => '15:00', 'end' => '16:00'];
$history_time = ['start' => '16:40', 'end' => '18:00'];

$course = '';
if ($current_day >= 1 && $current_day <= 5) {
    if ($current_time >= $math_time['start'] && $current_time <= $math_time['end']) {
        $course = '数学';
    } elseif ($current_time >= $english_time['start'] && $current_time <= $english_time['end']) {
        $course = '英语';
    } elseif ($current_time >= $bio_time['start'] && $current_time <= $bio_time['end']) {
        $course = '生物';
    } elseif ($current_time >= $geo_time['start'] && $current_time <= $geo_time['end']) {
        $course = '地理';
    } elseif ($current_day == 2 || $current_day == 4) {
        if ($current_time >= $politics_time['start'] && $current_time <= $politics_time['end']) {
            $course = '道法';
        } elseif ($current_time >= $history_time['start'] && $current_time <= $history_time['end']) {
            $course = '历史';
        }
    }
} else {
    $course = '张少，您正在休息，去放松一下吧！';
}

$greeting = '';
if ($current_day >= 6) { // 如果是周六或周日
    $hour = date('G');
    if ($hour >= 21 && $hour < 22) {
        $greeting = '张少，是时候该睡个好觉了！';
    } elseif ($hour >= 22 && $hour < 24) {
        $greeting = '还不睡，就睡不着咯！';
    } elseif ($hour >= 0 && $hour < 6) {
        $greeting = '好梦！';
    } elseif ($hour >= 6 && $hour < 7) {
        $greeting = '张少，早上好！';
    } elseif ($hour >= 7 && $hour < 12) {
        $greeting = '张少，上午好';
    } elseif ($hour >= 12 && $hour < 18) {
        $greeting = '张少，下午好！';
    } elseif ($hour >= 19 && $hour < 22) {
        $greeting = '张少，晚上好！';
    }
}

echo '<!DOCTYPE html>';
echo '<html><head>';
echo '<meta charset="UTF-8">';
echo '<meta http-equiv="refresh" content="60">';
echo '<style>';
echo 'body { font-family: Arial, sans-serif; }';
echo 'table { border-collapse: collapse; margin: 0 auto; }'; // 居中表格
echo 'table, th, td { border: none; }'; // 移除表格边框
echo 'th, td { padding: 10px; }';
echo '.top-info { text-align: center; }';
echo '.large-greeting { font-size: 1.5em; }';
echo '.date-time { font-size: 1.2em; }';
echo 'h2 { text-align: center; }'; // 新增的样式，用于居中标题
echo '</style>';
echo '</head><body>';
echo '<div class="top-info">';

// 输出问候语、时间、星期、日期
echo '<h1>张少的Kindle时钟</h1>';
if ($current_day >= 6) { // 如果是周末
    echo '<div class="large-greeting">' . htmlspecialchars($greeting) . '</div>';
}
echo '<div class="date-time">今天是：' . date('Y年m月d日') . '，星期' . $day_names[$current_day] . '</div>';
echo '<div class="date-time">现在时间：' . date('H:i') . '</div>';

echo '</div>';
echo '<div class="clock-container">';
echo '<h2>课程表</h2>';
echo '<table>';
echo '<tr><th>星期</th><th>第一节</th><th>第一节时间</th><th>第二节</th><th>第二节时间</th><th>第三节</th><th>第三节时间</th><th>第四节</th><th>第四节时间</th></tr>';
// ... 课程表循环输出 ...
for ($i = 1; $i <= 5; $i++) {
    echo '<tr>';
    echo '<td>' . $day_names[$i] . '</td>';
    echo '<td>数学</td><td>' . $math_time['start'] . ' - ' . $math_time['end'] . '</td>';
    echo '<td>英语</td><td>' . $english_time['start'] . ' - ' . $english_time['end'] . '</td>';
    if ($i % 2 == 1) {
        echo '<td>生物</td><td>' . $bio_time['start'] . ' - ' . $bio_time['end'] . '</td>';
        echo '<td>地理</td><td>' . $geo_time['start'] . ' - ' . $geo_time['end'] . '</td>';
    } else {
        echo '<td>道法</td><td>' . $politics_time['start'] . ' - ' . $politics_time['end'] . '</td>';
        echo '<td>历史</td><td>' . $history_time['start'] . ' - ' . $history_time['end'] . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
echo '</div>';
echo '</body></html>';
