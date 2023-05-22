export interface BladeUIHooks {
  hook (hook: string, callback: CallableFunction): void,
  dispatchHook (hook: string): void
}

