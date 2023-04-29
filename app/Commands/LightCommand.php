<?php

namespace App\Commands;

use App\Clients\Tuya\Devices;
use App\Enums\LightState;
use App\Utils\Colors;
use LaravelZero\Framework\Commands\Command;
use function Termwind\render;

class LightCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'light {state} {--color=} {--brightness=} {--temperature=}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Turn on/off the light';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        $devices = Devices::getDevices();
        $state = LightState::tryFromString($this->argument('state'));
        if (! $state) {
            $this->error('Unicos estados válidos: on, off');

            return;
        }

        $optionColor = $this->option('color') ?? Colors::DEFAULT_COLORS['white'];
        if (array_key_exists($optionColor, Colors::DEFAULT_COLORS)) {
            $color = Colors::defaultColorToHSV($optionColor);
        } else {
            $color = Colors::RGBtoHSV($optionColor);
        }

        $response = $devices->post_commands(config('services.tuya.device_id'), [
            'commands' => [
                [
                    'code' => 'switch_led',
                    'value' => (bool) $state->value,
                ],
                [
                    'code' => 'work_mode',
                    'value' => 'colour',
                ],
                [
                    'code' => 'bright_value_v2',
                    'value' => (int) ($this->option('brightness') ?? 1000),
                ],
                [
                    'code' => 'temp_value_v2',
                    'value' => (int) ($this->option('temperature') ?? 1000),
                ],
                [
                    'code' => 'colour_data_v2',
                    'value' => $color,
                ],
                [
                    'code' => 'countdown_1',
                    'value' => 0,
                ],
                [
                    'code' => 'do_not_disturb',
                    'value' => true,
                ],
            ],
        ]);

        $status = collect($devices->get_status(config('services.tuya.device_id'))->result);

        render(
            view('light', compact('state', 'response', 'status'))
        );

    }
}
