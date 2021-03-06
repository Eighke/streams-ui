---
title: Introduction
enabled: true
---

## Streams UI

The Streams UI package provides UI resources, including a control panel. The UI system extends the [stream domain information](../core/streams#domain-information).

### Input Types

Input types separate the concerns of [data-modeling](domain-entities) vs. data-management and provide a refreshing new layer of flexibility.

- [Input Types](inputs)

### UI Components

Several flexible UI components are available and can be used both within and outside of a control panel. We use a factory-like `builder` pattern and utilize [Svelte](https://svelte.dev/) to provide native JS components where applicable.

- [Builders](builders)
- [Components](components)

### Control Panel

The Streams platform provides a consistent, user-friendly, and "hella-performant" control panel that puts you in control of every aspect. Zero configuration is necessary by default.

- [Control Panel](cp)
