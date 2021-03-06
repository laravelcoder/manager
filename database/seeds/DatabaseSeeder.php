<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(ChannelsListSeed::class);
        $this->call(ChannelServerSeed::class);
        $this->call(CountrySeed::class);
        $this->call(ProtocolSeed::class);
        $this->call(CsiSeed::class);
        $this->call(CsoSeed::class);
        $this->call(SyncServerSeed::class);
        $this->call(FilterSeed::class);
        $this->call(GeneralSettingSeed::class);
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(TimezoneSeed::class);
        $this->call(UserSeed::class);
        $this->call(VideoServerTypeSeed::class);
        $this->call(RoleSeedPivot::class);
        $this->call(UserSeedPivot::class);
    }
}
